import React from 'react';
import { View, Text, SafeAreaView, ScrollView, Alert } from 'react-native';
import { stylesDashboard, stylesFishpondName, stylesCharts, stylesAlign, stylesFishPondBorder, stylesNavigationBar, stylesIcon, stylesIcon1, stylesIcon2, stylesNavbarText } from '../../components/styles.js';
import { AnimatedCircularProgress } from 'react-native-circular-progress';
import { FontAwesome } from '@expo/vector-icons'; 
import { SimpleLineIcons } from '@expo/vector-icons';
import CustomButton from '../../components/CustomButton';

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

const showTemp = () =>
  Alert.alert(
    "Temparature",
);

const showO2= () =>
  Alert.alert(
    "O2",
);

const showPH = () =>
  Alert.alert(
    "PH",
);

const Index = () => {
    return (

      <SafeAreaView style={stylesDashboard.container}>
        <ScrollView>

          <View>
            <Text style={stylesDashboard.name} > Dashboard </Text>
          </View>

          {/* Fishpond 1 */}
          <View style={stylesFishPondBorder.container}>
              <View style={stylesFishpondName.container}>
                <Text style={stylesFishpondName.titleText} > Fishpond 1 </Text>
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
                <Text style={stylesDashboard.circleText} onPress={showTemp}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1} onPress={showO2}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2} onPress={showPH}> PH </Text>
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
                <Text style={stylesDashboard.circleText} onPress={showTemp}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1} onPress={showO2}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2} onPress={showPH}> PH </Text>
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
                <Text style={stylesDashboard.circleText} onPress={showTemp}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1} onPress={showO2}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2} onPress={showPH}> PH </Text>
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
                <Text style={stylesDashboard.circleText} onPress={showTemp}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1} onPress={showO2}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2} onPress={showPH}> PH </Text>
              </View>
          </View>
        </View>
        </ScrollView>
        <View style={stylesNavigationBar.container}>
          <View>
          <FontAwesome style={stylesIcon.container} name="dashboard" />
            <Text>Dashboard</Text>
          </View>
          <View>
            <FontAwesome style={stylesIcon1.container} name="user-circle-o"/>
            <Text style={stylesNavbarText.container}>User</Text>
          </View>
          <View>
            <SimpleLineIcons style={stylesIcon2.container} name="menu" />
            <Text>Menu</Text>
          </View>
        </View>
      </SafeAreaView>
    );
  };

export default Index;