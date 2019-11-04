<template>
  <div class="relative">
    <button
      href="#"
      class="flex items-center"
      @click="toggleVisibility"
      @keydown.space.exact.prevent="toggleVisibility"
      @keydown.esc.exact="hideDropdown"
      @keydown.shift.tab="hideDropdown"
      @keydown.up.exact.prevent="startArrowKeys"
      @keydown.down.exact.prevent="startArrowKeys"
    >
      <span class="ml-2">{{ $i18n.locale.toUpperCase() }}</span>
      <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" width="24" height="24"><path class="heroicon-ui" d="M15.3 9.3a1 1 0 0 1 1.4 1.4l-4 4a1 1 0 0 1-1.4 0l-4-4a1 1 0 0 1 1.4-1.4l3.3 3.29 3.3-3.3z"></path></svg>
    </button>
    <transition name="dropdown-fade">
      <ul v-on-clickaway="hideDropdown" v-if="isVisible" ref="dropdown" class="absolute normal-case z-30 font-normal xs:left-0 lg:right-0 bg-white shadow overflow-hidden rounded w-48 border mt-2 py-1 lg:z-20">
        <li>
          <a
            href="#"
            @click.prevent="setLocale('en')"
            ref="account"
            class="flex items-center px-3 py-3 hover:bg-gray-200"
            @keydown.up.exact.prevent=""
            @keydown.tab.exact="focusNext(false)"
            @keydown.down.exact.prevent="focusNext(true)"
            @keydown.esc.exact="hideDropdown"
          >
            <img src="../assets/img/flag_en.svg" alt="english flag" class="h-8 w-8">
            <span class="ml-2">English</span>
          </a>
        </li>
        <li>
          <a
            href="#"
            @click.prevent="setLocale('ph')"
            class="flex items-center px-3 py-3 hover:bg-gray-200"
            @keydown.shift.tab="focusPrevious(false)"
            @keydown.up.exact.prevent="focusPrevious(true)"
            @keydown.down.exact.prevent=""
            @keydown.tab.exact="hideDropdown"
            @keydown.esc.exact="hideDropdown"
          >
            <img src="../assets/img/flag_ph.svg" alt="english flag" class="h-8 w-8">
            <span class="ml-2">Philippine</span>
          </a>
        </li>
          <li>
              <a
                  href="#"
                  @click.prevent="setLocale('ar')"
                  class="flex items-center px-3 py-3 hover:bg-gray-200"
                  @keydown.shift.tab="focusPrevious(false)"
                  @keydown.up.exact.prevent="focusPrevious(true)"
                  @keydown.down.exact.prevent=""
                  @keydown.tab.exact="hideDropdown"
                  @keydown.esc.exact="hideDropdown"
              >
                  <img src="../assets/img/flag_ar.svg" alt="english flag" class="h-8 w-8">
                  <span class="ml-2">Arabic</span>
              </a>
          </li>
          <li>
              <a
                  href="#"
                  @click.prevent="setLocale('ind')"
                  class="flex items-center px-3 py-3 hover:bg-gray-200"
                  @keydown.shift.tab="focusPrevious(false)"
                  @keydown.up.exact.prevent="focusPrevious(true)"
                  @keydown.down.exact.prevent=""
                  @keydown.tab.exact="hideDropdown"
                  @keydown.esc.exact="hideDropdown"
              >
                  <img src="../assets/img/flag_ind.svg" alt="english flag" class="h-8 w-8">
                  <span class="ml-2">Indonesia</span>
              </a>
          </li>
      </ul>
    </transition>
  </div>
</template>

<script>
import { mixin as clickaway } from 'vue-clickaway'

export default {
  mixins: [ clickaway ],
  data() {
    return {
      isVisible: false,
      focusedIndex: 0,
    }
  },
  methods: {
    toggleVisibility() {
      this.isVisible = !this.isVisible
    },
    hideDropdown() {
      this.isVisible = false
      this.focusedIndex = 0
    },
    startArrowKeys() {
      if (this.isVisible) {
        // this.$refs.account.focus()
        this.$refs.dropdown.children[0].children[0].focus()
      }
    },
    focusPrevious(isArrowKey) {
      this.focusedIndex = this.focusedIndex - 1
      if (isArrowKey) {
        this.focusItem()
      }
    },
    focusNext(isArrowKey) {
      this.focusedIndex = this.focusedIndex + 1
      if (isArrowKey) {
        this.focusItem()
      }
    },
    focusItem() {
      this.$refs.dropdown.children[this.focusedIndex].children[0].focus()
    },
    setLocale(locale) {
      this.$i18n.locale = locale
      this.$router.push({
        params: { lang: locale }
      })
      this.hideDropdown()
    }

  }
}
</script>

<style scoped>
  .dropdown-fade-enter-active, .dropdown-fade-leave-active {
    transition: all .1s ease-in-out;
  }
  .dropdown-fade-enter, .dropdown-fade-leave-to {
    opacity: 0;
    transform: translateY(-12px);
  }
    .absolute{
        list-style: none;
        padding-left: 0;
    }
    .flex img{
        width: 70px;
    }
  .ml-2{
      margin-left:1rem !important;
  }
.relative button{
    width: 100% !important;
    height: 73px !important;
    background: #1cb6c5;
    color: #fff;
    border: none;
}

  @media (max-width: 576px) {
      .flex img{
          display: none;
      }
      .relative .absolute{
          width: 300px;
          margin-left: 41px;
      }
      .relative button{
          width: 80% !important;
          margin-left: 10%;
      }
      .absolute li a{

          font-size: 14px;
          color:gray;
      }
      .flex img span{
          margin-left: 1rem !important;
          font-size: 14px;
          color: gray;
      }
      .absolute li {
          text-align: center;
      }
  }


</style>

