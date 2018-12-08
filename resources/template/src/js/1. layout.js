// Debounced resize event (width only). [ref: https://paulbrowne.xyz/debouncing]
var _resize = function (a, b) {
  var c = [window.innerWidth]
  return window.addEventListener('resize', function () {
    var e = c.length
    c.push(window.innerWidth)
    if (c[e] !== c[e - 1]) {
      clearTimeout(b)
      b = setTimeout(a, 150)
    }
  }), a
}

// Bootstrap BreakPoint Checker
var breakPoint = function (value) {
  var el, check, cls

  switch (value) {
    case 'xs':
      cls = 'd-none d-sm-block'
      break
    case 'sm':
      cls = 'd-block d-sm-none d-md-block'
      break
    case 'md':
      cls = 'd-block d-md-none d-lg-block'
      break
    case 'lg':
      cls = 'd-block d-lg-none d-xl-block'
      break
    case 'xl':
      cls = 'd-block d-xl-none'
      break
    case 'smDown':
      cls = 'd-none d-md-block'
      break
    case 'mdDown':
      cls = 'd-none d-lg-block'
      break
    case 'lgDown':
      cls = 'd-none d-xl-block'
      break
    case 'smUp':
      cls = 'd-block d-sm-none'
      break
    case 'mdUp':
      cls = 'd-block d-md-none'
      break
    case 'lgUp':
      cls = 'd-block d-lg-none'
      break
  }

  el = $('<div/>', {
    'class': cls
  }).appendTo('body')

  check = el.is(':hidden')
  el.remove()

  return check
}
var xs     = function () { return breakPoint('xs') }
var sm     = function () { return breakPoint('sm') }
var md     = function () { return breakPoint('md') }
var lg     = function () { return breakPoint('lg') }
var xl     = function () { return breakPoint('xl') }
var smDown = function () { return breakPoint('smDown') }
var mdDown = function () { return breakPoint('mdDown') }
var lgDown = function () { return breakPoint('lgDown') }
var smUp   = function () { return breakPoint('smUp') }
var mdUp   = function () { return breakPoint('mdUp') }
var lgUp   = function () { return breakPoint('lgUp') }

// This is for development, attach breakpoint to document title
/*var docTitle = document.title
_resize(function () {
  if (xs()) {
    document.title = '(xs) ' + docTitle
  } else if (sm()) {
    document.title = '(sm) ' + docTitle
  } else if (md()) {
    document.title = '(md) ' + docTitle
  } else if (lg()) {
    document.title = '(lg) ' + docTitle
  } else if (xl()) {
    document.title = '(xl) ' + docTitle
  }
})()*/

$(function () {

  var menu = $('#menu').metisMenu()
  menu.on('show.metisMenu', function () {
    $('.no-sub').removeClass('mm-active')
  })

  var body = $('body'),
      searchForm = $('.form-search'),
      searchInput = $('.input-search')

  // Preventing form from submitting if input is empty
  searchForm.submit(function (event) {
    if (searchInput.val() == '') {
      searchInput.focus()
      event.preventDefault()
    }
  })

  // Add border-primary when search input focused
  searchInput.focus(function () {
    $(this).closest('.input-group').addClass('border-primary')
  }).blur(function () {
    $(this).closest('.input-group').removeClass('border-primary')
  })

  // Toggle search form
  $('.search-toggle').click(function (event) {
    searchForm.toggleClass('d-none')
    searchForm.is(':not(:hidden)') && searchInput.focus()
    event.preventDefault()
  })

  // Sticky Header
  var stickyHeader = function () {
    var header = $('header'),
        wrapper = $('<div id="wrapper"></div>')
    header.before(wrapper)
    var ost = wrapper.offset().top,
        fixedCls = 'fixed-top',
        lastScroll = $(window).scrollTop()
    $(window).scroll(function () {
      var headerHeight = header.outerHeight(),
          scrollTop = $(this).scrollTop()
      if (scrollTop < lastScroll) {
        if (scrollTop <= ost) {
          header.hasClass(fixedCls) && header.removeClass(fixedCls)
          wrapper.height(0)
        }
      } else {
        if (scrollTop >= ost + headerHeight + 20) {
          header.addClass(fixedCls)
          wrapper.height(headerHeight)
        }
      }
      lastScroll = scrollTop
    }).scroll()
  }
  stickyHeader()

  // Offcanvas menu modal
  var offCanvas = function () {
    var menuModal = $('#menuModal')
    menuModal.on('show.bs.modal', function () {
      body.addClass('transparent-backdrop') // add transparent backdrop
    })
    menuModal.on('hidden.bs.modal', function () {
      body.removeClass('transparent-backdrop') // remove transparent backdrop
      $(this).css('display', 'block') // keep showing modal
      var thisTimeout = parseFloat(menuModal.find('.modal-dialog').css('transition-duration')) * 1000 // get dialog transition duration
      setTimeout(function () {
        menuModal.css('display', 'none') // hide modal after dialog transition
      }, thisTimeout)
    })
  }
  offCanvas()

})
