import Vue from 'vue';
import Vuex from 'vuex';
import merge from 'deepmerge';
import api from '../api';

Vue.use(Vuex);

let store = new Vuex.Store({
    state: {
        is_authenticated: false,
        token: false,
        messages: [],
    },
    modules: {},
    mutations: {
        merge(state, data) {
            for (let [key, value] of Object.entries(data)) {
                if (Array.isArray(value) && Array.isArray(state[key])) {
                    state[key] = merge(state[key], value);
                } else if (state[key] !== undefined) {
                    state[key] = value;
                }
            }
        },
        logout(state) {
            state.is_authenticated = false;
        },
        token(state, token) {
            state.token = token;
        }
    },
    actions: {
        logout(context) {
            api.SingleRequest('logout')
                .success(() => {
                    context.commit('logout');
                })
                .fire();
        }
    }
});

if (data) {
    store.commit('merge', JSON.parse(atob(data)));
}

export let helpers = {
    trans(key, parameters) {
        if (!store.state.messages)
            return key;

        let value = key.split('.').reduce(function (a, b) {
            if (a && (typeof a === 'object') && a[b])
                return a[b];
            else
                return null;
        }, store.state.messages);

        if (!value)
            return key;

        if (!parameters || parameters.length === 0)
            return value;

        for (let [param, replacement] of Object.entries(parameters)) {
            value = value.replace(':' + param, replacement);
        }

        return value;
    }
};

export default store;