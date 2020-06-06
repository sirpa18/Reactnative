import React from 'react';
import { StyleSheet, Text, View, TextInput, TouchableOpacity, AsyncStorage, Keyboard, ScrollView, Image} from 'react-native';


import Routes from './src/Routes';

export default class App extends React.Component   {
  render() {
    return (
      <View style={styles.container}>
        <View style={styles.header}>
          <Image
            source={require('./assets/asgicon.png')}
            style={styles.image}
          />
          <Text style = {styles.asg}>ASGARDIA {"\n"}<Text style={{fontSize:16,fontWeight:"50",fontFamily:"Avenir Next"}}> THE SPACE NATION</Text></Text>
        </View>
        <Routes />
        <View style={styles.footer}>
        </View>
      </View>

    );
  }
}

const styles = StyleSheet.create({
    container: {
      flex: 1,
      justifyContent: "center",
      backgroundColor: "#243365"
    },
    header: {
      flexDirection: "row",
      backgroundColor: "#424242",
      width:500,
      height:150
    },
    image: {
      width: 80, 
      height: 80, 
      borderRadius: 40/2, 
      marginLeft:65,
      marginTop:55
    },
    asg: {
      color:"white",
      fontWeight:"bold",
      fontFamily:"Avenir Next",
      textAlign: "center",
      fontSize:30,
      marginLeft:30,
      marginTop:68
    },
    footer: {
      backgroundColor: "#424242",
      width:500,
      height:70
    }
});
 
