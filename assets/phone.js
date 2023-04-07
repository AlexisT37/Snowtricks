console.log('phone.js loaded');
var hiddenOnMobile = document.getElementsByClassName('hidden-on-mobile');


// Function to get the current screen width
function getScreenWidth() {
    return window.innerWidth;
  }
  
  // Function to handle screen width changes
  function handleScreenWidthChange() {
    var screenWidth = getScreenWidth();
    if (screenWidth < 768) {
      for (var i = 0; i < hiddenOnMobile.length; i++) {
        hiddenOnMobile[i].setAttribute('disabled', 'true');
        hiddenOnMobile[i].style.display = 'none';
      }
    } else {
    for (var i = 0; i < hiddenOnMobile.length; i++) {
        hiddenOnMobile[i].setAttribute('disabled', 'false');
        hiddenOnMobile[i].style.display = 'flex';
        
      }
    
    }
  
  }
  
  // Get the initial screen width
  var screenWidth = getScreenWidth();
  handleScreenWidthChange();
  
  // Add an event listener for the window resize event
  window.addEventListener('resize', handleScreenWidthChange);
  
