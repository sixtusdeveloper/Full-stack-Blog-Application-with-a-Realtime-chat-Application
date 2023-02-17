$(document).ready(function () {
  // Click To Scroll Up
  $('#scroll-top').click(function () {
    $('html, body').animate(
      {
        scrollTop: 0,
      },
      1000,
    )
  })
})

// HambagerMenu toggler
const navItems = document.querySelector('.nav__items')
const openNavBtn = document.querySelector('#open__nav-btn')
const closeNavBtn = document.querySelector('#close__nav-btn')

// OPen Nav dropdown
const openNav = () => {
  navItems.style.display = 'flex'
  openNavBtn.style.display = 'none'
  closeNavBtn.style.display = 'inline-block'
}

// Close CloseNav
const closeNav = () => {
  navItems.style.display = 'none'
  openNavBtn.style.display = 'inline-block'
  closeNavBtn.style.display = 'none'
}
openNavBtn.addEventListener('click', openNav)
closeNavBtn.addEventListener('click', closeNav)

// Sidebar Buttons
const sideBar = document.querySelector('aside')
const openSideBarBtn = document.querySelector('#open__sidebar-btn')
const closeSideBarBtn = document.querySelector('#close__sidebar-btn')

// Open Side Bar on small devices
const openSideBar = () => {
  sideBar.style.left = '0'
  openSideBarBtn.style.display = 'none'
  closeSideBarBtn.style.display = 'inline-block'
}

// Close Side Bar on small devices
const closeSideBar = () => {
  sideBar.style.left = '-100%'
  openSideBarBtn.style.display = 'inline-block'
  closeSideBarBtn.style.display = 'none'
}

// openSideBarBtn.addEventListener('click', openSideBar)
// closeSideBarBtn.addEventListener('click', closeSideBar)

// Toggle view post category button
function fetch_all_category() {
  var items = document.querySelector('#items')
  var CategoryBtn = document.querySelector('#fetch_categories')
  let openAllCategory = 'View more categories'
  let openLessCategory = 'View more categories'

  if (CategoryBtn.innerHTML === openAllCategory) {
    CategoryBtn.innerHTML = openLessCategory
  } else {
    CategoryBtn.innerHTML = openAllCategory
  }
}

// Redirect user when clicked on contact button on the home comment image
function redirect_user_contact_page() {
  url_isset_contact = 'contact.php'
  window.location.replace(url_isset_contact)
}

// Remove submit Error Message
// For Signup form
function removeErrMsg1() {
  const ErrorMsg = document.querySelector('.alert__message')
  ErrorMsg.style.display = 'none'
}

// Remove submit Error Message
// For Home page / Comment form
function removeErrMsgTwo() {
  const ErrorMsgTwo = document.querySelector('.alert__message')
  ErrorMsgTwo.style.display = 'none'
}

// Remove submit Success Message
// For Signin page / Comment form
function removeSucMsgOne() {
  const SucMsgOne = document.querySelector('.alert__message')
  SucMsgOne.style.display = 'none'
}

// Remove submit Error Message
// For Signin page / Comment form
function removeErrMsgThree() {
  const ErrorMsgthree = document.querySelector('.alert__message')
  ErrorMsgthree.style.display = 'none'
}

// Remove submit Error Message
// For Add post page / Comment form
function removeErrMsgFour() {
  const ErrorMsgFour = document.querySelector('.alert__message')
  ErrorMsgFour.style.display = 'none'
}

// Remove submit Error Message
// For Add category page / Comment form
function removeErrMsgFive() {
  const ErrorMsgFive = document.querySelector('.alert__message')
  ErrorMsgFive.style.display = 'none'
}

// Remove submit Error Message
// For Add Users page / Comment form
function removeErrMsgSix() {
  const ErrorMsgSix = document.querySelector('.alert__message')
  ErrorMsgSix.style.display = 'none'
}

// FAQ reply function
// User Reply
const isset_reply_on = document.querySelector('#respond-yes')
const isset_reply_off = document.querySelector('#respond-no')
let result = document.querySelector('#result')
let reject = document.querySelector('#reject')
let Default_acceptedText = 'Yes'
let Default_declinedText = 'No'
let Previous_accepted_response = '😞'
let Previous_declined_response = '🙏🏽'

// For Yes Reply
function respond_yes() {
  if (isset_reply_on.innerHTML === Default_acceptedText) {
    if (isset_reply_off.innerHTML === Previous_accepted_response) {
      isset_reply_off.innerHTML = Default_declinedText
    } else {
      isset_reply_on.innerHTML = Previous_declined_response
      isset_reply_off.innerHTML = Default_declinedText
      result.style.display = 'block'
      reject.style.display = 'none'
    }
  } else {
    isset_reply_on.innerHTML = Default_acceptedText
    result.style.display = 'none'
    reject.style.display = 'none'
  }
  setTimeout(function () {
    result.style.display = 'none'
    isset_reply_on.innerHTML = Default_acceptedText
  }, 5000)
}

// For No Reply
function respond_no() {
  if (isset_reply_off.innerHTML === Default_declinedText) {
    if (isset_reply_on.innerHTML === Previous_declined_response) {
      isset_reply_on.innerHTML = Default_acceptedText
    } else {
      isset_reply_off.innerHTML = Previous_accepted_response
      isset_reply_on.innerHTML = Default_acceptedText
      result.style.display = 'none'
      reject.style.display = 'block'
    }
  } else {
    isset_reply_off.innerHTML = Default_declinedText
    result.style.display = 'none'
    reject.style.display = 'none'
  }
  setTimeout(() => {
    reject.style.display = 'none'
    isset_reply_off.innerHTML = Default_declinedText
  }, 5000)
}

// Accordion script
const acc_btns = document.querySelectorAll('.accordion-header')
const acc_contents = document.querySelectorAll('.accordion-body')

// Looping over all the AccBtns
acc_btns.forEach((btn) => {
  btn.addEventListener('click', (e) => {
    acc_contents.forEach((acc) => {
      if (
        e.target.nextElementSibling !== acc &&
        acc.classList.contains('active')
      ) {
        acc.classList.remove('active')
        acc_btns.forEach((btn) => btn.classList.remove('active'))
      }
    })

    const panel = btn.nextElementSibling
    panel.classList.toggle('active')
    btn.classList.toggle('active')
  })
})

window.onclick = (e) => {
  if (!e.target.matches('.accordion-header')) {
    acc_btns.forEach((btn) => btn.classList.remove('active'))

    acc_contents.forEach((acc) => acc.classList.remove('active'))
  }
}
