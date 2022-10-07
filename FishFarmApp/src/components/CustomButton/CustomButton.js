import React from 'react'
import { View, Text, StyleSheet, Pressable } from 'react-native'

const CustomButton = ({ onPress, text, type ="PRIMARY" }) => {
    return (
        <Pressable onPress={onPress} style={[styles.container, styles[`container_${type}`]]}>
            <Text style={[styles.text, styles[`text_${type}`]]}>{text}</Text>
        </Pressable>
    );
};

const styles = StyleSheet.create({
    container: {
        width: '150%',
        padding: 15,
        alignItems: 'center',
        borderRadius: 5,
    },

    container_PRIMARY: {
        backgroundColor: '#006CFF',
        borderColor: '#0065A3',
        borderWidth: 1,
        marginVertical: 5,
    },

    container_SECONDARY: {
        borderColor: '#0065A3',
        borderWidth: 1,
        marginVertical: 10,
    },

    container_TERTIARY: {
        marginVertical: 14,
    },

    text: {
        fontWeight: 'bold',
        color: 'white',
    },

    text_SECONDARY: {
        color: '#0065A3',
    },

    text_TERTIARY: {
        fontWeight: 'bold',
        color: 'white',
    },
});

export default CustomButton