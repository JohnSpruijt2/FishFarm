import React, {useState} from 'react';
import { View, Text, Image, StyleSheet, useWindowDimensions, ScrollView, TextInput } from 'react-native';
import Logo from '../../../assets/logo.png';
import CustomInput from '../../components/CustomInput';
import CustomButton from '../../components/CustomButton';
import { useNavigation } from '@react-navigation/native';
import { useForm, Controller } from 'react-hook-form';
import {signInWithEmailAndPassword} from "firebase/auth";
import { auth } from '../../../firebaseConfig.js'



const SignInScreen = () => {
    const {height} = useWindowDimensions();
    const navigation = useNavigation();

    var [email, setEmail] = useState('');
    var [password, setPassword] = useState('');

    const PASSWORD_REGEX = /^[A-Za-z0-9 ]+$/;

    const login = async () => {
        try {
        const user = await signInWithEmailAndPassword(auth, email, password)
        navigation.navigate('Dashboard');
        console.log(user)
        } catch(error){
            console.log(error.code);
            console.log(error.message);
            
        }
    };

    const {
        control, 
        handleSubmit, 
        formState: {errors},
    } = useForm();

    const onSignInPressed = (data) => {
        console.log(data);
        //validate User
        navigation.navigate('Dashboard');
    };
    const onForgotPasswordPressed = () => {
        navigation.navigate('ForgotPassword');
    };
    const onSignUpPressed = () => {
        navigation.navigate('SignUp');
    };

    return (
        <ScrollView style={styles.backgroundcolor}>
        <View style={styles.root}>
            <Image source={Logo} style={[styles.logo, {height: height * 0.3}]} resizeMode="contain" />

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
                
            />

            <CustomButton text="Sign In" onPress={login}/>
            <CustomButton text="Forgot password?" onPress={onForgotPasswordPressed} type="TERTIARY"/>
            
            <Text style={styles.text}>Don't have an account? {' '}
            <Text style={styles.link} onPress={onSignUpPressed}>Create one</Text>
            </Text>
        </View>
        </ScrollView>
    )
}

const styles = StyleSheet.create({
    root: {
        alignItems: 'center',
        padding: 100,
        backgroundColor: '#0C98EE',
        flex: 1,
    },
    backgroundcolor: {
        backgroundColor: '#0C98EE',

    },
    logo: {
        width: '70%',
        maxWidth: 300,
        maxHeight: 200,
    },
    text: {
        color: 'white',
        marginVertical: 40,
        width: '122%',
        fontWeight: 'bold', 
    },
    link: {
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

export default SignInScreen;