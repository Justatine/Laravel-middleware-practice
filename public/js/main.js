var usertype = Cookies.get("usertype")
var userid = Cookies.get("userid")

function updateText() {
  var screenSize = $(window).width(); 

  if (screenSize <= 576) { 
      $('#site-title').text('Pizza Ordering'); 
  } else {
      $('#site-title').text('Online Pizza Ordering System');
  }
}

updateText();
$(window).on('resize', function() {
  updateText();
});

$(document).on("click", "#logout", function () {

  Swal.fire({
      text: "Do you really want to logout?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonColor: "#3085d6",
      cancelButtonColor: "#d33",
      confirmButtonText: "Yes"
  }).then((result) => {
      if (result.isConfirmed) {
        Cookies.remove('userid');
        Cookies.remove('usertype');
        
          const Toast = Swal.mixin({
              toast: true,
              position: "top-end",
              showConfirmButton: false,
              timer: 3000,
              timerProgressBar: true,
              didOpen: (toast) => {
                  toast.onmouseenter = Swal.stopTimer;
                  toast.onmouseleave = Swal.resumeTimer;
              }
          });
          Toast.fire({
              icon: "success",
              title: "Logout successful"
          });

          setTimeout(function() { 
          window.location.replace("../");
          }, 3000);  
      }
  });
});

function getUrlParameter(name) {
    name = name.replace(/[\[\]]/g, "\\$&")
    var regex = new RegExp("[?&]" + name + "(=([^&#]*)|&|#|$)"),
      results = regex.exec(window.location.href)
    if (!results) return null
    if (!results[2]) return ''
    return decodeURIComponent(results[2].replace(/\+/g, " "))
}