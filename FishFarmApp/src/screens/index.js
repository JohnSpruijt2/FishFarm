import React, { Component } from 'react';
import { StatusBar } from 'expo-status-bar';
import { StyleSheet, Text, View, Image, TextInput, TouchableOpacity, useWindowDimensions } from 'react-native';
import { styles } from '../components/styles.js';

const source = {
  html: `
    <div class="gauge__body">
      <h1>Bruh</h1>
    </div>
  `
};

export function HomeScreen() {
  const { width } = useWindowDimensions();
    return (
      <View style={styles.container}>
        <Text>Fish Farm</Text>
        <StatusBar style="auto" />
      </View>
    );
  }

  