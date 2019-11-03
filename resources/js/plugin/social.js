export default {
    // providers: {
    //     google: {
    //         clientId: '420174800066-cbp0414khu23l39qpm2oqqr5j7nqr5mm.apps.googleusercontent.com',
    //         redirectUri: 'https://mery.com/api/auth/google/callback'
    //     },
    //     facebook: {
    //         clientId: '375530796488133',
    //         redirectUri: 'https://mery.com/api/auth/facebook/callback'
    //     },
    //     twitter: {
    //         clientId: '',
    //         redirectUri: 'https://mery.com/api/auth/twitter/callback'
    //     },
    // }
    providers: {
        google: {
            clientId: '420174800066-cbp0414khu23l39qpm2oqqr5j7nqr5mm.apps.googleusercontent.com',
            redirectUri: 'https://broker.dev/api/auth/google/callback'
        },
        facebook: {
            clientId: '375530796488133',
            redirectUri: 'https://broker.dev/api/auth/facebook/callback'
        },
        twitter: {
            clientId: '',
            redirectUri: 'https://broker.dev/api/auth/twitter/callback'
        },
    }
}
