import {RootState, useAppDispatch} from '../../_redux/app/store';
import React, {useEffect} from 'react';
import {getAdvertisement} from "../../actions/advertisement";
import {useSelector} from "react-redux";
import {Grid, TextField} from "@mui/material";
import {useParams} from "react-router-dom";

const ViewAdvertisement: React.FC = () => {
    const {advertisement} = useSelector((state: RootState) => state.advertisementReducer);
    const dispatch = useAppDispatch();
    const {id}: { id: string } = useParams();
    useEffect(() => {
        dispatch(getAdvertisement(id));

    }, [id])
    return (
        <div className="App">
            {advertisement &&
            <Grid container spacing={2}>
                <Grid item xs={12}>
                    <Grid container spacing={4}>
                        <Grid item xs={12}>
                            <TextField disabled defaultValue={advertisement?.title}/>
                        </Grid>
                        <Grid item xs={12}>
                            <TextField disabled defaultValue={advertisement?.link}/>
                        </Grid>
                        <Grid item xs={12}>
                            <TextField disabled defaultValue={advertisement?.validUntil.date}/>
                        </Grid>
                    </Grid>
                </Grid>
            </Grid>
            }
        </div>
    );
};

export default ViewAdvertisement;
