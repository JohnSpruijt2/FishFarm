import React, {useState} from 'react';
import { View, Text, StyleSheet, ScrollView } from 'react-native';
import CustomInput from '../../components/CustomInput';
import CustomButton from '../../components/CustomButton';
import { useNavigation } from '@react-navigation/native';
import { useForm } from 'react-hook-form';

const ConfirmEmailScreen = () => {
     const {control, handleSubmit} = useForm();

    const navigation = useNavigation();
    
    const onConfirmPressed = data => {
        console.warn(data);
        navigation.navigate('SignIn');
    };
    const onResendPressed = () => {
        console.warn("onResendPressed");
    };
    const onSignInPressed = () => {
        navigation.navigate('SignIn');
    };

    return (
        <ScrollView style={styles.backgroundcolor}>
        <View style={styles.root}>
            <Text style={styles.title}>Confirm your email</Text>
            
            <CustomInput
            name="code"
            control={control}
            placeholder="Enter your confirmation code"
            rules={{
                required: 'Confirmation code is required',
            }}
            />

            <CustomButton text="Confirm" onPress={handleSubmit(onConfirmPressed)}/>
            
            <CustomButton text="Resend Code" onPress={onResendPressed} type="SECONDARY"/>
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
        width: '120%',
    },
});

export default ConfirmEmailScreen;