import {RootState, useAppDispatch} from '../_redux/app/store';
import React, {useEffect} from 'react';
import {useSelector} from 'react-redux';
import AddAdvertisementForm from "../containers/AddAdvertisementForm";
import Menu from "../containers/Menu";
import {addAdvertisement} from "../actions/advertisement";
import {getMenu} from "../actions/menu";

const Home: React.FC = () => {
    const {data} = useSelector((state: RootState) => state.menuReducer);
    const dispatch = useAppDispatch();
    useEffect(()=>{
        dispatch(getMenu());
    },[])
    return (
        <div className="App">
            <Menu data={data}/>
            <AddAdvertisementForm onSubmit={(values) => dispatch(addAdvertisement(values))}/>
        </div>
    );
};

export default Home;
