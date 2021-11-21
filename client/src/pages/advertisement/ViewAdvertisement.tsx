import {RootState, useAppDispatch} from '../../_redux/app/store';
import React, {useEffect} from 'react';
import {getAdvertisement} from "../../actions/advertisement";
import {useSelector} from "react-redux";
import {Box, Grid, Stack} from "@mui/material";
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
                                <Stack spacing={12} direction="row">
                                    <Grid item xs={4}>
                                        <label className="label">Title:</label>
                                    </Grid>
                                    <Grid item xs={4}>
                                        <div>{advertisement.title}</div>
                                    </Grid>
                                </Stack>
                            </Grid>
                            <Grid item xs={12}>
                                <Stack spacing={12} direction="row">
                                    <Grid item xs={4}>
                                        <label className="label">Link:</label>
                                    </Grid>
                                    <Grid item xs={4}>
                                        <a href={advertisement.link} target="_blank">{advertisement.link}</a>
                                    </Grid>
                                </Stack>
                            </Grid>
                            <Grid item xs={12}>
                                <Stack spacing={12} direction="row">
                                    <Grid item xs={4}>
                                        <label className="label">Valid until:</label>
                                    </Grid>
                                    <Grid item xs={4}>
                                        <div>{new Date(advertisement.validUntil.date).toLocaleDateString('fr-fr', {
                                            year: 'numeric',
                                            month: '2-digit',
                                            day: '2-digit'
                                        }).substring(0, 10)}</div>
                                    </Grid>
                                </Stack>
                            </Grid>
                        </Grid>
                    </Grid>
                </Grid>
            }
        </div>
    );
};

export default ViewAdvertisement;
