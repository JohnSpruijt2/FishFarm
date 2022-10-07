import React, {useState} from 'react';
import { View, Text, StyleSheet, ScrollView } from 'react-native';
import CustomInput from '../../components/CustomInput';
import CustomButton from '../../components/CustomButton';
import { useNavigation } from '@react-navigation/native';
import { useForm } from 'react-hook-form';

const PASSWORD_REGEX = /^[A-Za-z0-9 ]+$/;

const NewPasswordScreen = () => {
    const { control, handleSubmit } = useForm();

    const navigation = useNavigation();

    const onSubmitPressed = data => {
        console.warn(data); 
        navigation.navigate('Dashboard');
    };
    const onSignInPressed = () => {
        navigation.navigate('SignIn');
    };

    return (
        <ScrollView style={styles.backgroundcolor}>
        <View style={styles.root}>
            <Text style={styles.title}>Reset your password</Text>
            
            <CustomInput 
            name="code"
            control={control}
            placeholder="Code"
            rules={{
                required: 'Code is required',
            }}
            />
            <CustomInput
            name="password"
            control={control}
            placeholder="Enter your new password" 
            rules={{
                required: 'Password is required', 
                minLength: {
                    value: 8, 
                    message: 'Password should be at least 8 characters long',
                },
                pattern: {
                    value: PASSWORD_REGEX,
                    message: 'Do not use special characters',
                },
            }}
            />

            <CustomButton text="Submit" onPress={handleSubmit(onSubmitPressed)}/>
            
            <CustomButton text="Back to Sign in" onPress={onSignInPressed} type="TERITIARY"/>
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
        width: '130%',
    },
});

export default NewPasswordScreen;