import React, {useState} from 'react';
import { View, Text, StyleSheet, ScrollView } from 'react-native';
import CustomInput from '../../components/CustomInput';
import CustomButton from '../../components/CustomButton';
import { useNavigation } from '@react-navigation/native';
import { useForm } from 'react-hook-form';

const EMAIL_REGEX = /^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;
const USERNAME_REGEX = /^[A-Za-z0-9 ]+$/;
const PASSWORD_REGEX = /^[A-Za-z0-9 ]+$/;

const SignUpScreen = () => {

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
            
            <CustomInput 
            name="username"
            control={control}
            placeholder="Username"
            rules={{
                required: 'Username is required', 
                minLength: {
                    value: 3, 
                    message: 'Username should be at least 3 characters long',
                },
                maxLength: {
                    value: 24,
                    message: 'Username should be max 24 characters long'
                },
                pattern: {
                    value: USERNAME_REGEX,
                    message: 'Do not use special characters',
                },
            }}
            />
            <CustomInput
            name="email"
            control={control}
            placeholder="Email"
            rules={{
                required: 'Email is required', 
                pattern: {
                    value: EMAIL_REGEX, 
                    message: 'Email is invalid'
                },
            }} 
            />
            <CustomInput
            name="password"
            control={control}
            placeholder="Password" 
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
            <CustomInput 
            name="password-confirm"
            control={control}
            placeholder="Confirm Password" 
            secureTextEntry={true}
            rules={{
                required: 'Confirmed password is required',
                validate: value => value === pwd || 'Password do not match',
            }}
            />

            <CustomButton text="Register" onPress={handleSubmit(onRegisterPressed)}/>
            
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
});

export default SignUpScreen;