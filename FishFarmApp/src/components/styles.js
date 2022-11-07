import { StyleSheet, Text, View, Image, TextInput, TouchableOpacity, } from 'react-native';

export const styles = StyleSheet.create({
    container: {
      flex: 1,
      backgroundColor: '#7393B3',
      alignItems: 'center',
      justifyContent: 'center',
    },

    logo: {
        width: '60%',
        maxWidth: '300%',
        maxHeight: '100%', 
    },

  });

  export const stylesDashboard = StyleSheet.create({
    container: {
      flex: 1,
      backgroundColor: '#7393B3',
    },

    scrollView: {
      marginHorizontal: 20,
    },

    gauge: {
      alignItems: 'flex-end',
    },



  });

  export const stylesMenu = StyleSheet.create({
    container: {
      flex: 1,
      backgroundColor: '#7393B3',
      justifyContent: 'center',
    },

    buttons: {
      flexDirection: 'row',
      justifyContent: 'space-around',
      marginVertical: 25,
    },

    separator: {
      marginVertical: 8,
    },

  });
    
    
