import { initializeApp } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-app.js";
import { getAuth, signInWithPopup, GoogleAuthProvider, FacebookAuthProvider } from "https://www.gstatic.com/firebasejs/11.6.0/firebase-auth.js";

const firebaseConfig = {
  apiKey: "AIzaSyCBEUox1tVIDK0ZXTUVDX6Pjm1xp_7gRIQ",
  authDomain: "auth-39a24.firebaseapp.com",
  projectId: "auth-39a24",
  storageBucket: "auth-39a24.firebasestorage.app",
  messagingSenderId: "477335022266",
  appId: "1:477335022266:web:428e58d053dfb1377bf083"
};

const app = initializeApp(firebaseConfig);
const auth = getAuth(app);
const provider = new GoogleAuthProvider();

export async function signInWithFacebook() {
  const provider = new FacebookAuthProvider();
  try {
    const result = await signInWithPopup(auth, provider);
    const user = result.user;
    const credential = FacebookAuthProvider.credentialFromResult(result);
    const accessToken = credential.accessToken;
    console.log(user);
    return true;
  } catch (error) {
    console.log(error);
    return false;
  }
}

export async function signInWithGoogle() {
  const provider = new GoogleAuthProvider();
  try {
    const result = await signInWithPopup(auth, provider);
    const credential = GoogleAuthProvider.credentialFromResult(result);
    const token = credential.accessToken;
    const user = result.user;
    console.log(user);
    return true;
  } catch (error) {
    console.error(error);
    return false;
  }
}

