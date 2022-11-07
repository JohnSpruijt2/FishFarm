import React from 'react';
import { View, Text, SafeAreaView, ScrollView, Dimensions, TouchableHighlight, StyleSheet} from 'react-native';
import { styles, stylesDashboard } from 'D:/laravel/FishFarm/FishFarmApp/src/components/styles.js';
import { createBottomTabNavigator } from '@react-navigation/bottom-tabs';
import { AnimatedCircularProgress } from 'react-native-circular-progress';
import SignInScreen from 'D:/laravel/FishFarm/FishFarmApp/src/screens/SigInScreen/SignInScreen.js';
import SignUpScreen from 'D:/laravel/FishFarm/FishFarmApp/src/screens/SignUpScreen/index.js';
import {
    LineChart,
    BarChart,
    PieChart,
    ProgressChart,
    ContributionGraph,
    StackedBarChart
  } from 'react-native-chart-kit'

//bottom navigation menu
const Tab = createBottomTabNavigator();

//circles
const Circle = () => {
    return <View style={stylesShape.circle} />;
};

//progress bar data
const data = {
    labels: ["PH"], // optional
    data: [0.4],
};
  
//the content in the navigation menu
function Navigation() {
    return (
            <Tab.Navigator screenOptions={{headerShown: false}}>
                <Tab.Screen name="SignIn" component={SignInScreen} />  
                <Tab.Screen name="SignUp" component={SignUpScreen} />                
            </Tab.Navigator>
    );
}


const Index = () => {
    return (
        <SafeAreaView style={stylesDashboard.container} >
            <ScrollView style={stylesDashboard.scrollView}>
            <Text style={{fontSize: 24, alignSelf: 'center'}}>Dashboard</Text>
            <View style={stylesDashboard.gauge}>
                
            <ProgressChart
                data={data}
                width={310}
                height={220}
                strokeWidth={16}
                radius={32}
                chartConfig={{
                    backgroundColor: "#7393B3",
                    backgroundGradientFrom: "#7393B3",
                    backgroundGradientTo: "#7393B3",
                    decimalPlaces: 2, // optional, defaults to 2dp
                    color: (opacity = 1) => `rgba(255, 255, 255, ${opacity})`,
                    labelColor: (opacity = 1) => `rgba(255, 255, 255, ${opacity})`,
                    style: {
                      borderRadius: 16
                    },
                    propsForDots: {
                      r: "6",
                      strokeWidth: "2",
                      stroke: "#ffa726"
                    }
                  }}
                hideLegend={false}
            />
            </View>
            <View>
              <AnimatedCircularProgress
                size={130}
                width={15}
                rotation={270}
                fill={30}
                duration={1500}
                arcSweepAngle={180}
                tintColor="#00e0ff"
                onAnimationComplete={() => console.log('onAnimationComplete')}
                backgroundColor="#3d5875" 
              />
            </View>
            <View>
                <Navigation />
            </View>
            </ScrollView>
        </SafeAreaView>
        
    );
};

const stylesShape = StyleSheet.create({
    circle: {
      width: 50,
      height: 50,
      borderRadius: 100 / 2,
      backgroundColor: "red",
    },
});

export default Index;