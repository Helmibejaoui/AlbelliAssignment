import {RootState, useAppDispatch} from '../../_redux/app/store';
import React, {useEffect} from 'react';
import AddAdvertisementForm from "../../containers/AddAdvertisementForm";
import {editAdvertisement, getAdvertisement} from "../../actions/advertisement";
import {useSelector} from "react-redux";
import {useParams} from "react-router-dom";
import {Grid} from "@mui/material";

const EditAdvertisement: React.FC = () => {
    const {advertisement} = useSelector((state: RootState) => state.advertisementReducer);
    const {id}: { id: string } = useParams();
    const dispatch = useAppDispatch();
    useEffect(() => {
        dispatch(getAdvertisement(id));
    }, [id])
    return (
        <div className="App">
            <Grid container spacing={2}>
                <Grid item xs={12}>
                    {advertisement &&
                    <AddAdvertisementForm defaultValues={{...advertisement,validUntil:new Date(advertisement.validUntil.date)}}
                                          onSubmit={(values) => dispatch(editAdvertisement({values,id}))}/>
                    }
                </Grid>
            </Grid>
        </div>
    );
};

export default EditAdvertisement;
