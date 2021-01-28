 var firebaseConfig = {
    apiKey: "AIzaSyDa9blpNlkQ2J-hiaUFYIEDSR9ESjI4wgU",
    authDomain: "smartagri-a3de8.firebaseapp.com",
    databaseURL: "https://smartagri-a3de8.firebaseio.com",
    projectId: "smartagri-a3de8",
    storageBucket: "smartagri-a3de8.appspot.com",
    messagingSenderId: "28299035800",
    appId: "1:28299035800:web:8ea64a9d3ffa40471dfced",
    measurementId: "G-HCG6MVMZNE"
  };
  // Initialize Firebase
  firebase.initializeApp(firebaseConfig);
  const auth = firebase.auth();


   function signUp() {
       var company = document.getElementById("company").value;
    var email = document.getElementById("email").value;
    var password = document.getElementById("password").value;
    var phone = document.getElementById("phone").value;

      if (email.length < 4) {
        alert('Please enter an email address.');
        return;
      }
      if (password.length < 4) {
        alert('Please enter a password.');
        return;
      }
      if (phone.length < 11){

        alert('your number is too less ');
        return;
      }
      // Create user with email and pass.
      // [START createwithemail]
      firebase.auth().createUserWithEmailAndPassword(email, password).then(() => {
           
            firebase.firestore().collection('organizations').doc(firebase.auth().currentUser.uid).set({
                company: company,
                email: email,
                password: password,
                phone: phone
            }).catch(function(error) {
        // Handle Errors here.
        var errorCode = error.code;
        var errorMessage = error.message;
        // [START_EXCLUDE]
        if (errorCode == 'auth/weak-password') {
          alert('The password is too weak.');
        } else {
          alert(errorMessage);
        }
        console.log(error);
        // [END_EXCLUDE]
      });
      // [END createwithemail]
    });
    }
