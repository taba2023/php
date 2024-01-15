let notLoggedIn = document.querySelector('#loginError');
let username = document.querySelector('#username');

if (username) {
    document.querySelector('#username').addEventListener('blur', function() {
        reset();
    });
}

if (notLoggedIn) {
    username.focus();
    username.style.background = '#ff0000';
    showToast("Please login first!", 4000);
}

function showToast(message, duration = 6000) {
    let toast = document.getElementById('toast');
    toast.innerHTML = message;
    toast.style.visibility = 'visible';
    setTimeout(function() {
        toast.style.visibility = 'hidden';
    }, duration);
  }

setTimeout(function() {
    let toast = document.getElementById('toast'); 
    toast.style.visibility = 'hidden';
}, duration);

function reset() {
    username.setAttribute('style', 'background: #fff;');
}

