import Axios from 'axios';
import userTransformer from '../transformers/user';

export default {

    all() {
        return Axios.get('/api/user', {
            responseType: 'json',
            //transformRequest: [(data) => {
            //    return userTransformer.sendCollection(data);
            //}],
            transformResponse: [(data) => {
                data.success.message = userTransformer.fetchCollection(data.success.message);

                return data.success.message;
            }]
        });
    }

}