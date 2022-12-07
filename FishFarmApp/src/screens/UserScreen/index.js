import React from 'react';
import { View, Text, SafeAreaView, ScrollView } from 'react-native';
import { stylesUser, stylesNavigationBar, stylesIcon, stylesIcon1, stylesIcon2, stylesNavbarText } from '../../components/styles.js';
import { FontAwesome } from '@expo/vector-icons'; 
import { SimpleLineIcons } from '@expo/vector-icons';
import { useNavigation } from '@react-navigation/native';


const Index = () => {

  const navigation = useNavigation();

  const onUserPressed = () => {
      navigation.navigate('User');
  };
  const onMenuPressed = () => {
      navigation.navigate('Menu');
  };
  
  const onDashboardPressed = () => {
      navigation.navigate('Dashboard');
  };

  const onNotificationPressed = () => {
      navigation.navigate('Notifications');
  };

  const onLogOutPressed = () => {
    navigation.navigate('SignIn');
};

    return (

      <SafeAreaView style={stylesUser.container}>
        <ScrollView>
          <View>
            <Text style={stylesUser.name}> Welcome "User" </Text>
          </View>
           <View style={stylesUser.card}>
              <View>
                <Text style={stylesUser.cardText} onPress={onNotificationPressed}>Notifications</Text>
                <Text style={stylesUser.cardText}>Change Password</Text>
                <Text style={stylesUser.cardText}>Team Settings</Text>
                <Text style={stylesUser.cardText}>Create New Team</Text>
                <Text style={stylesUser.cardText}>Switch Teams</Text>
                <Text style={stylesUser.cardText} onPress={onLogOutPressed}>Log Out</Text>
                
              </View>
          </View>
        </ScrollView>



        <View style={stylesNavigationBar.container}>
          <View>
          <FontAwesome onPress={onDashboardPressed} style={stylesIcon.container} name="dashboard" />
            <Text onPress={onDashboardPressed}>Dashboard</Text>
          </View>
          <View>
            <FontAwesome onPress={onUserPressed} style={stylesIcon1.container} name="user-circle-o"/>
            <Text style={stylesNavbarText.container} onPress={onUserPressed}>User</Text>
          </View>
          <View>
            <SimpleLineIcons onPress={onMenuPressed} style={stylesIcon2.container} name="menu" />
            <Text onPress={onMenuPressed}>Menu</Text>
          </View>
        </View>
      </SafeAreaView>
    );
  };

export default Index;