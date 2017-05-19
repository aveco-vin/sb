<template>

    <div>
        <div id="betonodd" v-if="! confirm">
            <button
                    @click="onPlaceBet('b', bankerOdd, bankerBet)"
                    :disabled="bankerBet == 0"
            >
                {{ betButtonLabel }}
            </button>
            <input
                    class="bet-input"
                    v-model="bankerBet"
                    :name="'b-odd-' + bankerOdd"
            >
            <button>X</button>

            <input
                    class="odd-display"
                    v-model="odd"
                    readonly
            >

            <button>X</button>
            <input
                    class="bet-input"
                    v-model="playerBet"
                    :name="'p-odd-' + playerOdd"
            >
            <button
                    @click="onPlaceBet('p', playerOdd, playerBet)"
                    :disabled="playerBet == 0"
            >
                {{ betButtonLabel }}
            </button>
        </div>

        <div id="confirmation" v-if="confirm">
            <span>{{ confirmation }}</span>
            <button @click="onConfirmBet(true)">Yes</button>
            <button @click="onConfirmBet(false)">No</button>
        </div>
    </div>

</template>

<script>

    export default {
        props: ['bankerOdd', 'playerOdd'],

        data: function data() {
            return {
                betButtonLabel: 'Bet',
                bet: 0,

                askConfirmation: false,
                confirmation: '',

                active: true,
                bankerBet: 0,
                playerBet: 0,

                userSide: '',
                userOdd: '',
                userBet: '',
            }
        },

        computed: {
            confirm() {
                return this.askConfirmation;
            },

            odd() {
                return this.bankerOdd + ' <> ' + this.playerOdd;
            }
        },

        methods: {
            createConfirmation(odd, amt) {
                this.confirmation = 'Confirm your bet on ODD ' + odd + ' (' + amt +') ?';
                this.askConfirmation = true;
            },

            onPlaceBet(side, odd, bet) {
                switch(side) {
                    case 'b':
                        console.log('bet on banker');
                        this.createConfirmation(odd, bet);
                        this.userSide = 'banker';
                        this.userOdd = odd;
                        this.userBet = bet;
                        break;
                    case 'p':
                        console.log('bet on player');
                        this.createConfirmation(odd, bet);
                        this.userSide = 'player';
                        this.userOdd = odd;
                        this.userBet = bet;
                        break;
                }
            },

            onConfirmBet(ans) {
                this.askConfirmation = false;
                if (ans) {
                    let actionData = {
                        'user': 'user_id',
                        'action': 'bet',
                        'event': '1',
                        'fight': '1',
                        'side': this.userSide,
                        'odd': this.userOdd,
                        'amt': this.userBet
                    };
                    console.log(actionData);
                    this.$emit('bet', JSON.stringify(actionData));
                }
                this.bankerBet = 0;
                this.playerBet = 0;
                this.userSide = '';
                this.userOdd = '';
                this.userBet = '';
            },
        },
    }

</script>

<style scoped>
    .odd-display {
        width: 80px;
        text-align: center;
    }

    .bet-input {
        width: 80px;
        text-align: right;
    }
</style>