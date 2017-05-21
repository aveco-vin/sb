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

                askConfirmation: false,
                confirmation: '',

                active: true,
                bankerBet: 0,
                playerBet: 0,

                betOn: '',
                betOdd: '',
                amount: '0',
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

            onPlaceBet(side, betOnOdd, amount) {
                switch(side) {
                    case 'b':
                        console.log('bet on banker');
                        this.createConfirmation(betOnOdd, amount);
                        this.betOn = 'b';
                        this.betOdd = betOnOdd;
                        this.amount = amount;
                        break;
                    case 'p':
                        console.log('bet on player');
                        this.createConfirmation(betOnOdd, amount);
                        this.betOn = 'p';
                        this.betOdd = betOnOdd;
                        this.amount = amount;
                        break;
                }
            },

            onConfirmBet(ans) {
                this.askConfirmation = false;
                if (ans) {
                    var actionData = {
                        'gameId': this.$parent.$data.gameInfo.gameId,
                        'userId': this.$parent.$data.playerInfo.playerId,
                        'betOn': this.betOn,
                        'odd': this.betOdd,
                        'amount': this.amount
                    };
                    console.log(actionData);
                    this.$emit('bet', actionData);
                }
                this.bankerBet = 0;
                this.playerBet = 0;
                this.betOn = '';
                this.betOdd = '';
                this.amount = '0';
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