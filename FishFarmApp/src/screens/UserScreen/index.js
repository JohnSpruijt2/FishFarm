import React from 'react';
import { View, Text, SafeAreaView, ScrollView } from 'react-native';
import { stylesDashboard, stylesNavigationBar, stylesIcon, stylesIcon1, stylesIcon2, stylesNavbarText } from '../../components/styles.js';
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

    return (

      <SafeAreaView style={stylesDashboard.container}>
        <ScrollView>

          <View>
            <Text style={stylesDashboard.name} > User </Text>
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