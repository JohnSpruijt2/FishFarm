import React, {useEffect, useState} from 'react';
import {
    View,
    Text,
    onChangeText,
    StyleSheet, 
    ScrollView,
    TextInput,
} from 'react-native';

import CustomButton from '../../components/CustomButton';
import { useNavigation } from '@react-navigation/native';
import { useForm } from 'react-hook-form';
import {createUserWithEmailAndPassword, getAuth} from "firebase/auth"

import { auth, provider, signInAndRetrieveDataWithCredential } from '../../../firebaseConfig.js'
import SignInScreen from '../SigInScreen/SignInScreen';

const EMAIL_REGEX = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
const USERNAME_REGEX = /^[A-Za-z0-9 ]+$/;
const PASSWORD_REGEX = /^[A-Za-z0-9 ]+$/;


const SignUpScreen = () => {
    const [userName, setUserName] = useState();
    var [email, setEmail] = useState('');
    var [password, setPassword] = useState('');
    
    //creates an account
    const register = async () => {
        try {
        const user = await createUserWithEmailAndPassword(auth, email, password)
        navigation.navigate('SignIn');
        console.log(user)
        } catch(error){
            console.log(error.code);
            console.log(error.message);
            
        }
    };

    const {control, handleSubmit, watch } = useForm();

    const pwd = watch('password');
    const navigation = useNavigation();

    const onRegisterPressed = () => {
        navigation.navigate('ConfirmEmail');
    };
    const onSignInPressed = () => {
        navigation.navigate('SignIn');
    };
    const onTermsOfUsePressed = () => {
        console.warn("Terms Of Use in progress");
    };
    const onPrivacyPolicyPressed = () => {
        console.warn("Privacy Policy in progress");
    };
    

    return (
        <ScrollView style={styles.backgroundcolor}>
        <View style={styles.root}>
            <Text style={styles.title}>Create an account</Text>
            
            <TextInput
                style={styles.TextInput}
                placeholder="email"
                onChangeText={newText => setEmail(newText)}
                defaultValue={email}
            />
            <TextInput
                style={styles.TextInput}
                placeholder="password"
                onChangeText={newText => setPassword(newText)}
                defaultValue={password}
                secureTextEntry={true}
                rules={{
                    required: 'Password is required', 
                    pattern: {
                        value: PASSWORD_REGEX,
                        message: 'Do not use special characters',
                    },
                    minLength: {
                        value: 8, 
                        message: 'Password should be at least 8 characters long',
                    },
                }}
                />

            <CustomButton text="Register" onPress={register}/>
            
            <Text style={styles.text}>By registering, you confirm that you accept our {' '}
            <Text style={styles.link} onPress={onTermsOfUsePressed}>Terms of Use</Text> and{' '}
            <Text style={styles.link}onPress={onPrivacyPolicyPressed}>Privacy Policy</Text>.
            </Text>

            <Text style={styles.text2}>Already have an account?{' '}
            <Text style={styles.link2} onPress={onSignInPressed}>Log in</Text>
            </Text>
        </View>
        </ScrollView>
    )
}

const styles = StyleSheet.create({
    root: {
        alignItems: 'center',
        padding: 100,
    },
    backgroundcolor: {
        backgroundColor: '#0C98EE',

    },
    title: {
        fontSize: 24,
        fontWeight: 'bold',
        color: '#FFFF',
        margin: 10,
        width: '110%',
    },
    text: {
        color: 'white',
        marginVertical: 20,
        width: '150%',
    },
    link: {
        color: '#006CFF',
        fontWeight: 'bold',      
    },
    text2: {
        color: 'white',
        marginVertical: 50,
        width: '120%',
        fontWeight: 'bold', 
    },
    link2: {
        color: '#006CFF',
        fontWeight: 'bold',      
    },
    TextInput: {
        backgroundColor: 'white',
        width: '150%',

        borderColor: '#0065A3',
        borderWidth: 1,
        borderRadius: 5,

        paddingHorizontal: 10,
        paddingVertical: 10,
        marginVertical: 10,
    }
});

export default SignUpScreen;