import React from 'react';
import { View, Text, SafeAreaView, ScrollView, Alert } from 'react-native';
import { stylesDashboard, stylesFishpondName, stylesCharts, stylesAlign, stylesFishPondBorder, stylesNavigationBar, stylesIcon, stylesIcon1, stylesIcon2, stylesNavbarText } from '../../components/styles.js';
import { AnimatedCircularProgress } from 'react-native-circular-progress';
import { FontAwesome } from '@expo/vector-icons'; 
import { SimpleLineIcons } from '@expo/vector-icons';
import { useNavigation } from '@react-navigation/native';

const Circle = () => {
  return <View style={stylesDashboard.circle} />;
};
const Circle1 = () => {
  return <View style={stylesDashboard.circle1} />;
};
const Circle2 = () => {
  return <View style={stylesDashboard.circle2} />;
};

/* Alerts that pop up when you click on a circle*/

const Index = () => {

const navigation = useNavigation();

//navigates to the user page
const onUserPressed = () => {
    navigation.navigate('User');
};

//navigates to the menu page
const onMenuPressed = () => {
    navigation.navigate('Menu');
};

//navigates to the dashboard page
const onDashboardPressed = () => {
    navigation.navigate('Dashboard');
};

//navigates to the fishpond page
const onFishpondPressed = () => {
  navigation.navigate('Fishpond');
};

const onO2Pressed = () => {
  navigation.navigate('O2');
};

const onPHPressed = () => {
  navigation.navigate('PH');
};

const onTEMPressed = () => {
  navigation.navigate('Temp');
};

    return (

      <SafeAreaView style={stylesDashboard.container}>
        <ScrollView>

          <View>
            <Text style={stylesDashboard.name} > Dashboard </Text>
          </View>

          {/* Fishpond 1 */}
          <View style={stylesFishPondBorder.container}>
              <View style={stylesFishpondName.container}>
                <Text style={stylesFishpondName.titleText} onPress={onFishpondPressed}> Fishpond 1 </Text>
              </View>
        
              <View style={stylesAlign.container}>
                <View style={stylesCharts.container}>
                  <AnimatedCircularProgress
                    size={130}
                    width={15}
                    rotation={270}
                    fill={30}
                    duration={1500}
                    arcSweepAngle={180}
                    tintColor="#00e0ff"
                    onAnimationComplete={() => console.log('onAnimationComplete')}
                    backgroundColor="#3d5875" />
                </View>
              <View>
                <Circle1 />
                <Text style={stylesDashboard.circleText} onPress={onTEMPressed}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1} onPress={onO2Pressed}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2} onPress={onPHPressed}> PH </Text>
              </View>
            </View>
          </View>

          {/* Fishpond 2 */}

          <View style={stylesFishPondBorder.container}>
              <View style={stylesFishpondName.container}>
                <Text style={stylesFishpondName.titleText} > Fishpond 2 </Text>
              </View>
        
              <View style={stylesAlign.container}>
                <View style={stylesCharts.container}>
                  <AnimatedCircularProgress
                    size={130}
                    width={15}
                    rotation={270}
                    fill={90}
                    duration={1500}
                    arcSweepAngle={180}
                    tintColor="#00e0ff"
                    onAnimationComplete={() => console.log('onAnimationComplete')}
                    backgroundColor="#3d5875" />
                </View>
              <View>
              <Circle1 />
                <Text style={stylesDashboard.circleText} onPress={onTEMPressed}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1} onPress={onO2Pressed}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2} onPress={onPHPressed}> PH </Text>
              </View>
          </View>
        </View>

        {/* Fishpond 3 */}

        <View style={stylesFishPondBorder.container}>
              <View style={stylesFishpondName.container}>
                <Text style={stylesFishpondName.titleText} > Fishpond 3 </Text>
              </View>
        
              <View style={stylesAlign.container}>
                <View style={stylesCharts.container}>
                  <AnimatedCircularProgress
                    size={130}
                    width={15}
                    rotation={270}
                    fill={60}
                    duration={1500}
                    arcSweepAngle={180}
                    tintColor="#00e0ff"
                    onAnimationComplete={() => console.log('onAnimationComplete')}
                    backgroundColor="#3d5875" />
                </View>
              <View>
              <Circle1 />
                <Text style={stylesDashboard.circleText} onPress={onTEMPressed}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1} onPress={onO2Pressed}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2} onPress={onPHPressed}> PH </Text>
              </View>
          </View>
        </View>

        {/* Fishpond 4 */}

        <View style={stylesFishPondBorder.container}>
              <View style={stylesFishpondName.container}>
                <Text style={stylesFishpondName.titleText} > Fishpond 4 </Text>
              </View>
        
              <View style={stylesAlign.container}>
                <View style={stylesCharts.container}>
                  <AnimatedCircularProgress
                    size={130}
                    width={15}
                    rotation={270}
                    fill={20}
                    duration={1500}
                    arcSweepAngle={180}
                    tintColor="#00e0ff"
                    onAnimationComplete={() => console.log('onAnimationComplete')}
                    backgroundColor="#3d5875" />
                </View>
              <View>
              <Circle1 />
                <Text style={stylesDashboard.circleText} onPress={onTEMPressed}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1} onPress={onO2Pressed}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2} onPress={onPHPressed}> PH </Text>
              </View>
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