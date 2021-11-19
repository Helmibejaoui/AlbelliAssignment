import {createSlice, PayloadAction} from '@reduxjs/toolkit';
import {getMenu} from "../../actions/menu";


export type menuState = {
    loading: boolean;
    data: [];

};

const initialState: menuState = {
    loading: false,
    data: [],
};
export const menuSlice = createSlice({
    name: 'menu',
    initialState,
    reducers: {
        /*incrementAction: (state) => {
          state.count += 1;
        },*/
    },
    extraReducers: {
        [getMenu.pending.type]: (state) => {
            state.loading = true;
        },
        // eslint-disable-next-line @typescript-eslint/no-explicit-any
        [getMenu.fulfilled.type]: (state, {payload}: PayloadAction<[]>) => {
            state.data = payload;
        },
        [getMenu.rejected.type]: (state) => {
            state.loading = false;
        },
    },
});

//export const {incrementAction} = advertisementSlice.actions;
export default menuSlice.reducer;
