import React, {useEffect} from 'react';
import {Route, Switch} from 'react-router-dom';

import './App.css';
import Home from './pages/Home';
import AddAdvertisement from "./pages/advertisement/AddAdvertisement";
import EditAdvertisement from "./pages/advertisement/EditAdvertisement";
import ViewAdvertisement from "./pages/advertisement/ViewAdvertisement";
import ResponsiveDrawer from "./containers/Menu";
import {Box} from "@mui/material";
import {getMenu} from "./actions/menu";
import {useAppDispatch} from "./_redux/app/store";

const App = (): JSX.Element => {
    const dispatch = useAppDispatch();
    useEffect(() => {
        dispatch(getMenu());
    }, [])
    return (<>
            <Box sx={{display: 'flex'}}>
                <ResponsiveDrawer/>
                <Box
                    component="main"
                    sx={{flexGrow: 1, p: 3, width: {sm: `calc(100% - ${240}px)`}}}
                >
                    <Switch>
                        <Route exact path="/" component={Home}/>
                        <Route path="/advertisement/new" component={AddAdvertisement}/>
                        <Route path="/advertisement/edit/:id" component={EditAdvertisement}/>
                        <Route path="/advertisement/view/:id" component={ViewAdvertisement}/>
                    </Switch>
                </Box>
            </Box>
        </>
    );
}


export default App;

