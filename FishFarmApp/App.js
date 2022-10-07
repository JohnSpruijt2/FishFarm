import React from 'react';
import { StyleSheet, Text, View, Image, SafeAreaView } from 'react-native';
import Navigation from './src/navigation';

const App = () => {
  return (
    <SafeAreaView style={styles.root}>
      <Navigation />
    </SafeAreaView>
  );
};

const styles = StyleSheet.create({
  root: {
    flex: 1,
  },
});

export default App;