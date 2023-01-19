// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";
import AsyncStorage from '@react-native-async-storage/async-storage';
import { initializeAuth, getReactNativePersistence} from 'firebase/auth/react-native';
//import { getAnalytics } from "firebase/analytics";

// Your web app's Firebase configuration
// For Firebase JS SDK v7.20.0 and later, measurementId is optional
const firebaseConfig = {
  apiKey: "AIzaSyAevr1AP1GtAkHNZgtk1hHS5gm6gXLD_dg",
  authDomain: "atlantis-aquaculture-farm.firebaseapp.com",
  databaseURL: "https://atlantis-aquaculture-farm-default-rtdb.europe-west1.firebasedatabase.app",
  projectId: "atlantis-aquaculture-farm",
  storageBucket: "atlantis-aquaculture-farm.appspot.com",
  messagingSenderId: "841817918030",
  appId: "1:841817918030:web:6b4cf3e755763a595b511f",
  measurementId: "G-EXVZR4K5JQ"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);

const async = initializeAuth(app, {
  persistence: getReactNativePersistence(AsyncStorage)
  });

export const auth = getAuth(app, async)

//const analytics = getAnalytics(app);