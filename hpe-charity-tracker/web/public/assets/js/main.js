/*
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
*/

(function($) {
  // Breakpoints.
  skel.breakpoints({
    xlarge: "(max-width: 1680px)",
    large: "(max-width: 1280px)",
    medium: "(max-width: 980px)",
    small: "(max-width: 736px)",
    xsmall: "(max-width: 480px)"
  });

  $(function() {
    var $window = $(window),
      $body = $("body");

    // Disable animations/transitions until the page has loaded.
    $body.addClass("is-loading");

    $window.on("load", function() {
      window.setTimeout(function() {
        $body.removeClass("is-loading");
      }, 100);
    });

    // Prioritize "important" elements on medium.
    skel.on("+medium -medium", function() {
      $.prioritize(
        ".important\\28 medium\\29",
        skel.breakpoint("medium").active
      );
    });

    // Off-Canvas Navigation.

    // Navigation Panel.
    $(
      '<div id="navPanel">' +
        $("#nav").html() +
        '<a href="#navPanel" class="close"></a>' +
        "</div>"
    )
      .appendTo($body)
      .panel({
        delay: 500,
        hideOnClick: true,
        hideOnSwipe: true,
        resetScroll: true,
        resetForms: true,
        side: "left"
      });

    // Fix: Remove transitions on WP<10 (poor/buggy performance).
    if (skel.vars.os == "wp" && skel.vars.osVersion < 10)
      $("#navPanel").css("transition", "none");
  });
})(jQuery);

// Scroll to form
function scrollToItem(item) {
  var diff = (item.offsetTop - window.scrollY) / 8;
  if (Math.abs(diff) > 1) {
    window.scrollTo(0, window.scrollY + diff);
    clearTimeout(window._TO);
    window._TO = setTimeout(scrollToItem, 30, item);
  } else {
    window.scrollTo(0, item.offsetTop);
  }
}

// Getting data from file upload
function getFileName(myFile, fileName) {
  var file = myFile.files[0];
  var filename = file.name;
  document.getElementById(fileName).innerHTML = "    " + filename;
}

// Getting data from donation history upload
function getDonData(myFile) {
  var file = myFile.files[0];
  var filename = file.name;
  document.getElementById("donfile").innerHTML = "    " + filename;
}

function validate_form(){
  // Check text fields
  var good_to_submit = true;
  good_to_submit = check_text_field('first_name', good_to_submit);
  good_to_submit = check_text_field('last_name', good_to_submit);
  good_to_submit = check_text_field('email', good_to_submit);

  // Check file uploads
  good_to_submit = check_file_field('vol_file', good_to_submit);
  good_to_submit = check_file_field('don_file', good_to_submit);
  
  return good_to_submit
}

function check_text_field(input_id, good_to_submit){
  var input = document.getElementById(input_id);
  if(input.value == ""){
    input.style = "background: #e6a4a4";
    return false;
  }
  input.style = "background: #6cc091";
  return true && good_to_submit;
}
function check_file_field(input_id, good_to_submit){
  var file_input = document.getElementById(input_id)
  if(file_input.files.length == 0){
    document.getElementById(input_id.replace("_","")).style = "color: #e6a4a4";
    return false;
  }
  document.getElementById(input_id.replace("_","")).style = "color: inherit";
  return true && good_to_submit;
}

// Create a session to get your hours logged without typing email again.
// This means no login is needed as this is persistent memory.
function createUserSession() {
  // Validate form.
  validate_form();
  var sessionEmail = document.getElementById("email").value;
  var sessionName = document.getElementById("first_name").value;
  // If localstorage is allowed (IE8+)
  if (typeof Storage !== "undefined") {
    // Setting storage
    localStorage.setItem("email", sessionEmail);
    localStorage.setItem("name", sessionName);
  } else {
    // Using cookies to store the data for 5 weeks
    var d = new Date();
    // 35 days + the current time
    d.setTime(d.getTime() + (35*24*60*60*1000));
    var expires = "expires="+ d.toUTCString();
    document.cookie = "email=" + sessionEmail + ";" + expires + ";path=/";
    document.cookie = "name=" + sessionName + ";" + expires + ";path=/";

  }
}

// Get a your hours logged without typing email again.
function getUserSession() {
  // Object used to return all values.
  var obj = {
    email: "",
    name: ""
  };
  // If localstorage is allowed (IE8+).
  if (typeof Storage !== "undefined") {
    // Getiing email and name from storage.
    obj.email = localStorage.getItem("email");
    obj.name = localStorage.getItem("name");
    return obj;
  } else {
    // Getiing email and name from the browser cookies.
    obj.email = getCookie(email);
    obj.name = getCookie(name);
    return obj;
  }
}

// Returns the contents of a cookie from the cookie name.
function getCookie(cname) {
  var name = cname + "=";
  var decodedCookie = decodeURIComponent(document.cookie);
  var ca = decodedCookie.split(';');
  for(var i = 0; i <ca.length; i++) {
    var c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}