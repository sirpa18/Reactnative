import React, { Component } from 'react';
import {exp, Stack, Scene} from 'react-native-router-flux';
 
import Login from 'Login';
import Signup from 'Signup';
 
export default class exp extends Component {
    render() {
        return (
            <exp barButtonIconStyle ={styles.barButtonIconStyle}
                hideNavBar={false} 
                navigationBarStyle={{backgroundColor: '#1565c0',}} 
                titleStyle={{color: 'white',}}
            >
                <Stack key="root">
                <Scene key="login" component={Login} title="Login"/>
                <Scene key="signup" component={Signup} title="Sign up"/>
                </Stack>
            </exp>
        )
    }
}
 
const styles = {
    barButtonIconStyle: {
        tintColor: 'white'
    }
}