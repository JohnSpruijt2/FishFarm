import { StyleSheet } from 'react-native';


export const stylesDashboard = StyleSheet.create({
  container: {
    flex: 1,
    backgroundColor: '#0C98EE',
  },

  scrollView: {
    marginHorizontal: 20,
  },

  name: {
    fontSize: 30,
    fontWeight: 'bold',
    marginTop: 50,
    marginBottom: 15,
    color: '#FFFF',
  },

  gauge: {
    alignItems: 'flex-end',
  },

  circle: {
    width: 50,
    height: 50,
    borderRadius: 100 / 2,
    backgroundColor: "red",
  },

  circleText: {
    marginLeft: 2,
  },

  circle1: {
    width: 50,
    height: 50,
    borderRadius: 100 / 2,
    backgroundColor: "yellow",
  },

  circleText1: {
    marginLeft: 11,
  },

  circle2: {
    width: 50,
    height: 50,
    borderRadius: 100 / 2,
    backgroundColor: "green",
  },

  circleText2: {
    marginLeft: 11,
  },

});

  export const stylesFishpondName = StyleSheet.create({
    container: {
      paddingTop: 20,
      paddingBottom: 20,
      alignItems: 'center',
    },

    titleText: {
      fontSize: 20,
      fontWeight: 'bold',

    },

  });

  export const stylesCharts = StyleSheet.create({
    container: {
      paddingLeft: 20,
    },

  });

  export const stylesAlign = StyleSheet.create({
    container: {
      flexDirection: "row",
      justifyContent: 'space-between',
      paddingRight: 20,
    },

  });

  export const stylesFishPondBorder = StyleSheet.create({
    container: {
      borderRadius: 5,
      marginBottom: 5,
      marginTop: 10,
      backgroundColor: '#FFFF',
      marginLeft: 10,
      marginRight: 10,
    },

  });

  export const stylesNavigationBar = StyleSheet.create({
    container: {
      borderRadius: 0,
      backgroundColor: '#F0E7E7',
      borderTopColor: '#000000',
      padding: 10,
      flexDirection: "row",
      justifyContent: 'space-between',
      paddingLeft: 40,
      paddingRight: 50,
    },

  });

  export const stylesIcon = StyleSheet.create({
    container: {
      paddingLeft: 23,
      color: '#000000',
      fontSize: 24,
    },

  });

  export const stylesIcon1 = StyleSheet.create({
    container: {
      paddingLeft: 2,
      color: '#000000',
      fontSize: 24,
    },

  });

  export const stylesNavbarText = StyleSheet.create({
    container: {
      paddingRight: 20,
    },

  });


  export const stylesIcon2 = StyleSheet.create({
    container: {
      paddingLeft: 5,
      color: '#000000',
      fontSize: 24,
    },

  });

  export const stylesUser = StyleSheet.create({
    container: {
      flex: 1,
      backgroundColor: '#0C98EE',
    },
  
    scrollView: {
      marginHorizontal: 20,
    },
  
    cardText: {
      fontSize: 20,
      fontWeight: 'bold',
      marginTop: 15,
      marginLeft: 20,
      marginBottom: 15,
      color: '#0C98EE',
    },

    name: {
      fontSize: 30,
      fontWeight: 'bold',
      marginTop: 50,
      color: '#FFFF',
    },

    card: {
      borderRadius: 5,
      marginBottom: 5,
      marginTop: 50,
      backgroundColor: '#FFFF',
      marginLeft: 10,
      marginRight: 10,
    },
  
  });
