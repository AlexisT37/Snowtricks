console.log('phone.js loaded');
var hiddenOnMobile = document.getElementsByClassName('hidden-on-mobile');


// Function to get the current screen width
function getScreenWidth() {
    return window.innerWidth;
  }
  
  // Function to handle screen width changes
  function handleScreenWidthChange() {
    var screenWidth = getScreenWidth();
    console.log("Screen width: " + screenWidth);
    if (screenWidth < 768) {
      console.log("Screen width is less than 768px");
      for (var i = 0; i < hiddenOnMobile.length; i++) {
        hiddenOnMobile[i].setAttribute('disabled', 'true');
        hiddenOnMobile[i].style.display = 'none';
      }
    } else {
        console.log("Screen width is greater than 768px");
    // enable the element with a class of 'hidden-on-mobile'
    for (var i = 0; i < hiddenOnMobile.length; i++) {
        hiddenOnMobile[i].setAttribute('disabled', 'false');
        hiddenOnMobile[i].style.display = 'flex';
      }
    
    }
  
  }
  
  // Get the initial screen width
  var screenWidth = getScreenWidth();
  console.log("Initial screen width: " + screenWidth);
  handleScreenWidthChange();
  console.log('initial handleScreenWidthChange() called');
  
  // Add an event listener for the window resize event
  window.addEventListener('resize', handleScreenWidthChange);
  


// var for the width of the screen in px
// var for selecting the element with a class of 'hidden-on-mobile'
console.log(hiddenOnMobile);
