Vue.component('tabs', {
    template: `
        <div>
            <div class="nav container-wrap">
                <div class="nav-tabs">
                    <ul>
                        <li v-for="tab in tabs" :class="{ 'active': tab.isActive }">
                            <a :href="tab.href" @click="selectTab(tab)">{{ tab.name }}</a>
                        </li>
                    </ul>
                </div>

                <div class="nav-links">
                    <ul>
                        <li><a href="http://mc.sitosis.com/map/">Map &rarr;</a></li>

                        <li><a href="http://mc.sitosis.com/forum/">Forum &rarr;</a></li>
                    </ul>
                </div>
            </div>

            <div class="content container-wrap">
                <slot></slot>
            </div>
        </div>
    `,

    data() {
        return { tabs: [] };
    },

    mounted() {
        this.tabs.forEach(tab => {
            if (window.location.hash.replace('#', '') == tab.href.replace('#', '')) {
                this.selectTab(tab);
            }
        });
    },

    created() {
        this.tabs = this.$children;
    },

    methods: {
        selectTab(selectedTab) {
            this.tabs.forEach(tab => {
                tab.isActive = (tab.href == selectedTab.href);
            });
        }
    }
});


Vue.component('tab', {
    template: `
        <div v-show="isActive"><slot></slot></div>
    `,

    props: {
        name: { required: true },
        selected: { default: false }
    },

    data() {
        return {
            isActive: false
        };
    },

    computed: {
        href() {
            return '#' + this.name.toLowerCase().replace(/ /g, '-');
        }
    },

    mounted() {
        this.isActive = this.selected;
    },
});

new Vue({
    el: '#root'
});
