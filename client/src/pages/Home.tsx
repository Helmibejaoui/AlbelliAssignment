import {RootState, useAppDispatch} from '../_redux/app/store';
import React, {useEffect} from 'react';
import {useSelector} from 'react-redux';
import {Delete, EditOutlined, RemoveRedEye} from '@mui/icons-material';
import {deleteAdvertisement, getAdvertisements} from "../actions/advertisement";
import {
    Grid,
    Paper,
    Table,
    TableBody,
    TableCell,
    TableContainer,
    TableHead,
    TableRow,
    IconButton
} from "@mui/material";
import {useHistory} from "react-router-dom";
import ResponsiveDrawer from "../containers/Menu";

const Home: React.FC = () => {
    const dispatch = useAppDispatch();
    const history = useHistory();
    const {advertisements} = useSelector((state: RootState) => state.advertisementReducer);
    useEffect(() => {
        dispatch(getAdvertisements([]));
    }, [])
    const deleteElement = (id: string) => {
        dispatch(deleteAdvertisement(id));
    }
    return (
        <div className="App">
            <Grid container spacing={2}>
                <Grid item xs={2}>
                    <ResponsiveDrawer/>
                </Grid>
                <Grid item xs={9}>
                    <TableContainer component={Paper}>
                        <Table sx={{minWidth: 500}} size="small" aria-label="customized table">
                            <TableHead style={{backgroundColor: '#e8f5fe'}}>
                                <TableRow>
                                    <TableCell align="center"
                                    >Title</TableCell>
                                    <TableCell align="center"
                                               className="table-tile-header">Link</TableCell>
                                    <TableCell align="center" className="table-tile-header">Valid
                                        until</TableCell>
                                    <TableCell align="center"
                                               className="table-tile-header">Actions</TableCell>
                                </TableRow>
                            </TableHead>
                            <TableBody>
                                {advertisements.map((a, index) => (
                                    <TableRow
                                        key={index}
                                        sx={{'&:last-child td, &:last-child th': {border: 0}}}
                                    >
                                        <TableCell align="center" component="th" scope="row">
                                            {a.title}
                                        </TableCell>
                                        <TableCell align="center" component="th" scope="row">
                                            {a.link}
                                        </TableCell>
                                        <TableCell
                                            align="center">{new Date(a.validUntil.date).toLocaleDateString('fr-fr', {
                                            year: 'numeric',
                                            month: '2-digit',
                                            day: '2-digit'
                                        }).substring(0, 10)}</TableCell>
                                        <TableCell align="center">
                                            <IconButton color="primary" aria-label="upload picture" component="span"
                                                        onClick={() => history.push(`/advertisement/edit/${a.id}`)}>
                                                <EditOutlined/>
                                            </IconButton>
                                            <IconButton color="primary" aria-label="upload picture" component="span"
                                                        onClick={() => history.push(`/advertisement/view/${a.id}`)}>
                                                <RemoveRedEye/>
                                            </IconButton>
                                            <IconButton color="error" aria-label="upload picture" component="span"
                                                        onClick={() => deleteElement(a.id)}>
                                                <Delete/>
                                            </IconButton>
                                        </TableCell>
                                    </TableRow>
                                ))}
                            </TableBody>
                        </Table>
                    </TableContainer>
                </Grid>
            </Grid>


        </div>
    );
};

export default Home;
