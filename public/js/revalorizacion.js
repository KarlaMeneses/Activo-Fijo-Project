
    // Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyDNAF2IXypq1WLBK2ManEUDq2NN3rPj9i8",
  authDomain: "imagenes-972f4.firebaseapp.com",
  projectId: "imagenes-972f4",
  storageBucket: "imagenes-972f4.appspot.com",
  messagingSenderId: "1030499470410",
  appId: "1:1030499470410:web:f1f47d5195089917baeab3",
  measurementId: "G-GPVPTSPG3K"
};

// Initialize Firebase
firebase.initializeApp(firebaseConfig);
document.getElementById('file').addEventListener('change', (event) => {
    const file = event.target.files[0];
    const storageRef = firebase.storage().ref('revalorizacion/' + file.name);
    storageRef.put(file).on('state_changed', (snapshot) => {
        const progress = (snapshot.bytesTransferred / snapshot.totalBytes) * 100;
        console.log(progress);
        const progressBar = document.getElementById('progress_bar');
        progressBar.value = progress;
    });
    storageRef.getDownloadURL().then(function(url){
        var image = document.getElementById('foto');
        console.log('firebase',url);//'firebase',url value
        image.src = url;
        document.getElementById('fotov').value = url;
        console.log(document.getElementById('fotov'));
    });
});
