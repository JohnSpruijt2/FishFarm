import React, {useState} from 'react';
import { View, Text, StyleSheet, ScrollView } from 'react-native';
import CustomInput from '../../components/CustomInput';
import CustomButton from '../../components/CustomButton';
import { useNavigation } from '@react-navigation/native';
import { useForm } from 'react-hook-form';

const ForgotPasswordScreen = () => {
    const { control, handleSubmit} = useForm();

    const navigation = useNavigation();

    const onSendPressed = data => {
        console.warn(data);
        navigation.navigate('NewPassword');
    };
    const onSignInPressed = () => {
        navigation.navigate('SignIn');
    };

    return (
        <ScrollView style={styles.backgroundcolor}>
        <View style={styles.container}>
            <Text style={styles.title}>Reset your password</Text>
            
            <CustomInput 
            name="username"
            control={control}
            placeholder="Username"
            rules={{
                required: 'Username is required',
            }}
            />

            <CustomButton text="Send" onPress={handleSubmit(onSendPressed)}/>
            
            <CustomButton text="Back to Sign in" onPress={onSignInPressed} type="TERITIARY"/>
        </View>
        </ScrollView>
    )
}

const styles = StyleSheet.create({
    container: {
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

export default ForgotPasswordScreen;