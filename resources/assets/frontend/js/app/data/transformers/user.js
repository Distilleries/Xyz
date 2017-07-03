import Transformer from '../../../libraries/transformer';

export default class UserTransformer extends Transformer {

    static fetch(user) {
        return {
            email: user.email,
            roleId: user.role_id
        };
    }

    static send(user) {
        return {
            email: user.email,
            role_id: user.roleId
        };
    }

}