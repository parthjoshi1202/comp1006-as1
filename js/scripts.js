function confirmDelete() {
   return confirm('Are you sure you want to delete this?');
}

function comparePw() {

   var pw1 = document.getElementById('password').value;
   var pw2 = document.getElementById('confirm_password').value;
   var pwMsg = document.getElementById('pwMsg');

   // comparing the 2 passwords entered
   if (pw1 != pw2) {
      pwMsg.innerText = 'Passwords don\'t match';
      pwMsg.className = 'text-danger';
      return false;
   }
   else {
      pwMsg.innerText = '';
      pwMsg.className = '';
      return true;
   }
}

function showHidePassword() {
   var pw = document.getElementById('password');
   var img = document.getElementById('showHide');

   if (pw.type == 'password') {
      pw.type = 'text';
      img.src = 'comp1006-as1/images/hide_pw.png';
   }
   else {
      pw.type = 'password';
      img.src = 'comp1006-as1/images/show_pw.png';
   }
}
