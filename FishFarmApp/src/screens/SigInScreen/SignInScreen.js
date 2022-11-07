import React, {useState} from 'react';
import { View, Text, Image, StyleSheet, useWindowDimensions, ScrollView, TextInput } from 'react-native';
import Logo from '../../../assets/logo.png';
import CustomInput from '../../components/CustomInput';
import CustomButton from '../../components/CustomButton';
import { useNavigation } from '@react-navigation/native';
import { useForm, Controller } from 'react-hook-form';

const SignInScreen = () => {
    const {height} = useWindowDimensions();
    const navigation = useNavigation();

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
    const dashboard = () => {
        navigation.navigate('dashboard');
    };

    return (
        <ScrollView style={styles.backgroundcolor}>
        <View style={styles.root}>
            <Image source={Logo} style={[styles.logo, {height: height * 0.3}]} resizeMode="contain" />

            <CustomInput
            name="username"
            placeholder="Username" 
            control={control}
            rules={{required: '*Username is required'}}

            />
            <CustomInput 
            name="password"
            placeholder="Password" 
            secureTextEntry 
            control={control}
            rules={{
                required: '*Password is required', 
                minLength: {
                    value: 8, 
                    message: '*Password should be minium 8 characters long'
                },
                }}
            />




            <CustomButton text="Sign In" onPress={handleSubmit(onSignInPressed)}/>
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
});

export default SignInScreen;