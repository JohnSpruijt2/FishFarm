import React from 'react';
import { View, Text, SafeAreaView, ScrollView, Dimensions, TouchableHighlight, StyleSheet} from 'react-native';
import { stylesDashboard, stylesFishpondName, stylesCharts, stylesAlign, stylesFishPondBorder } from 'C:/Program Files/Ampps/www/FishFarm/FishFarm/FishFarmApp/src/components/styles.js';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { AnimatedCircularProgress } from 'react-native-circular-progress';

//bottom navigation menu
const Tab = createBottomTabNavigator();

const Circle = () => {
  return <View style={stylesDashboard.circle} />;
};
const Circle1 = () => {
  return <View style={stylesDashboard.circle1} />;
};
const Circle2 = () => {
  return <View style={stylesDashboard.circle2} />;
};

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
                <Text style={stylesDashboard.circleText}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2}> PH </Text>
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
                <Text style={stylesDashboard.circleText}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2}> PH </Text>
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
                <Text style={stylesDashboard.circleText}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2}> PH </Text>
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
                <Text style={stylesDashboard.circleText}> TEMP </Text>
              </View>
              <View>
              <Circle2 />
                <Text style={stylesDashboard.circleText1}> O2 </Text>
              </View>
               <View>
              <Circle />
                <Text style={stylesDashboard.circleText2}> PH </Text>
              </View>
          </View>
        </View>
        </ScrollView>
      </SafeAreaView>
    );
  };

export default Index;