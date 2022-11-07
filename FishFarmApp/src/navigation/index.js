import React from 'react';
import { View, Text, StyleSheet } from 'react-native';
import { NavigationContainer } from '@react-navigation/native';
import { createNativeStackNavigator } from '@react-navigation/native-stack';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';

import  SignInScreen  from '../screens/SigInScreen';
import  SignUpScreen  from '../screens/SignUpScreen';
import ConfirmEmailScreen from '../screens/ConfirmEmailScreen';
import ForgotPasswordScreen from '../screens/ForgotPasswordScreen';
import NewPasswordScreen from '../screens/NewPasswordScreen';
import DashboardScreen from '../screens/DashboardScreen';

const Stack = createNativeStackNavigator();
const Tab = createBottomTabNavigator();

function Navigation(){
    return (
        <NavigationContainer independent={true}>
            <Stack.Navigator screenOptions={{headerShown: false}}>
                <Stack.Screen name="SignIn" component={SignInScreen} />
                <Stack.Screen name="SignUp" component={SignUpScreen} />
                <Stack.Screen name="ConfirmEmail" component={ConfirmEmailScreen} />
                <Stack.Screen name="ForgotPassword" component={ForgotPasswordScreen} />
                <Stack.Screen name="NewPassword" component={NewPasswordScreen} />
                <Stack.Screen name="Dashboard" component={DashboardScreen} />                   
            </Stack.Navigator>
        </NavigationContainer>
    );
};

function NavigationBottom(){
    return (
        <NavigationContainer>
            <Tab.Navigator screenOptions={{headerShown: false}}>
                <Tab.Screen name="SignIn" component={SignInScreen} />
                <Tab.Screen name="SignUp" component={SignUpScreen} />
                <Tab.Screen name="ConfirmEmail" component={ConfirmEmailScreen} />
                <Tab.Screen name="ForgotPassword" component={ForgotPasswordScreen} />
                <Tab.Screen name="NewPassword" component={NewPasswordScreen} />
                <Tab.Screen name="Dashboard" component={DashboardScreen} />                   
            </Tab.Navigator>
        </NavigationContainer>
    );
};

export default Navigation;