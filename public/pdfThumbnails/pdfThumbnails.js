/**
 * Find all img elements with data-pdf-thumbnail-file attribute,
 * then load pdf file given in the attribute,
 * then use pdf.js to draw the first page on a canvas,
 * then convert it to base64,
 * then set it as the img src.
 */
const createPDFThumbnails = function () {
  let worker = null
  let loaded = false
  const renderQueue = []

  // select all img elements with data-pdf-thumbnail-file attribute
  const nodesArray = Array.prototype.slice.call(document.querySelectorAll('img[data-pdf-thumbnail-file]'))

  if (!nodesArray.length) {
    // No PDF found, don't load PDF.js
    return
  }

  if (!loaded && typeof (pdfjsLib) === 'undefined') {
    const src = document.querySelector('script[data-pdfjs-src]').getAttribute('data-pdfjs-src')

    if (!src) {
      throw Error('PDF.js URL not set in "data-pdfjs-src" attribute: cannot load PDF.js')
    }

    const script = document.createElement('script')
    script.src = src
    document.head.appendChild(script).onload = renderThumbnails
    loaded = true
  } else {
    renderThumbnails()
  }

  function renderThumbnails () {
    if (!pdfjsLib) {
      throw Error('pdf.js failed to load. Check data-pdfjs-src attribute.')
    }

    nodesArray.forEach(function (element) {
      if (worker === null) {
        worker = new pdfjsLib.PDFWorker()
      }

      const filePath = element.getAttribute('data-pdf-thumbnail-file')
      const imgWidth = element.getAttribute('data-pdf-thumbnail-width')
      const imgHeight = element.getAttribute('data-pdf-thumbnail-height')

      pdfjsLib.getDocument({ url: filePath, worker }).promise.then(function (pdf) {
        pdf.getPage(1).then(function (page) {
          const canvas = document.createElement('canvas')
          let viewport = page.getViewport({ scale: 1.0 })
          const context = canvas.getContext('2d')

          if (imgWidth) {
            viewport = page.getViewport({ scale: imgWidth / viewport.width })
          } else if (imgHeight) {
            viewport = page.getViewport({ scale: imgHeight / viewport.height })
          }

          canvas.height = viewport.height
          canvas.width = viewport.width

          page.render({
            canvasContext: context,
            viewport
          }).promise.then(function () {
            element.src = canvas.toDataURL()
          })
        }).catch(function () {
          console.log('pdfThumbnails error: could not open page 1 of document ' + filePath + '. Not a pdf ?')
        })
      }).catch(function () {
        console.log('pdfThumbnails error: could not find or open document ' + filePath + '. Not a pdf ?')
      })
    })
  }
}

if (
  document.readyState === 'complete' ||
    (document.readyState !== 'loading' && !document.documentElement.doScroll)
) {
  createPDFThumbnails()
} else {
  document.addEventListener('DOMContentLoaded', createPDFThumbnails)
}
