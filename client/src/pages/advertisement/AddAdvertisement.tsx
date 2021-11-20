import {RootState, useAppDispatch} from '../../_redux/app/store';
import React from 'react';
import AddAdvertisementForm from "../../containers/AddAdvertisementForm";
import {addAdvertisement} from "../../actions/advertisement";
import {useSelector} from "react-redux";

const AddAdvertisement: React.FC = () => {
    const dispatch = useAppDispatch();
    return (
        <div className="App">
            <AddAdvertisementForm onSubmit={(values) => dispatch(addAdvertisement(values))}/>
        </div>
    );
};

export default AddAdvertisement;
