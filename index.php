<!DOCTYPE html>
<html lang="id" id="facebook" class="no_js">

<head>
    <meta charset="utf-8" />
    <meta name="referrer" content="origin-when-crossorigin" id="meta_referrer" />
    <script nonce="F6plcrgP">
        window._cstart = +new Date();
    </script>
    <script nonce="F6plcrgP">
        function envFlush(a) {
            function b(b) {
                for (var c in a) b[c] = a[c]
            }
            window.requireLazy ? window.requireLazy(["Env"], b) : (window.Env = window.Env || {}, b(window.Env))
        }
        envFlush({
            "ajaxpipe_token": "AXgid6PbzkLXLCIdAvc",
            "timeslice_heartbeat_config": {
                "pollIntervalMs": 33,
                "idleGapThresholdMs": 60,
                "ignoredTimesliceNames": {
                    "requestAnimationFrame": true,
                    "Event listenHandler mousemove": true,
                    "Event listenHandler mouseover": true,
                    "Event listenHandler mouseout": true,
                    "Event listenHandler scroll": true
                },
                "isHeartbeatEnabled": true,
                "isArtilleryOn": false
            },
            "shouldLogCounters": true,
            "timeslice_categories": {
                "react_render": true,
                "reflow": true
            },
            "sample_continuation_stacktraces": true,
            "dom_mutation_flag": true,
            "gk_requirelazy_mem": true,
            "stack_trace_limit": 30,
            "timesliceBufferSize": 5000,
            "show_invariant_decoder": false,
            "compat_iframe_token": "AQ6qcN8cl7Sg_G1uzc8",
            "isCQuick": false
        });
    </script>
    <style nonce="F6plcrgP"></style>
    <script nonce="F6plcrgP">
        __DEV__ = 0;
        CavalryLogger = window.CavalryLogger || function(a) {
            this.lid = a, this.transition = !1, this.metric_collected = !1, this.is_detailed_profiler = !1, this.instrumentation_started = !1, this.pagelet_metrics = {}, this.events = {}, this.ongoing_watch = {}, this.values = {
                t_cstart: window._cstart
            }, this.piggy_values = {}, this.bootloader_metrics = {}, this.resource_to_pagelet_mapping = {}, this.initializeInstrumentation && this.initializeInstrumentation()
        }, CavalryLogger.prototype.setIsDetailedProfiler = function(a) {
            this.is_detailed_profiler = a;
            return this
        }, CavalryLogger.prototype.setTTIEvent = function(a) {
            this.tti_event = a;
            return this
        }, CavalryLogger.prototype.setValue = function(a, b, c, d) {
            d = d ? this.piggy_values : this.values;
            (typeof d[a] === "undefined" || c) && (d[a] = b);
            return this
        }, CavalryLogger.prototype.getLastTtiValue = function() {
            return this.lastTtiValue
        }, CavalryLogger.prototype.setTimeStamp = CavalryLogger.prototype.setTimeStamp || function(a, b, c, d) {
            this.mark(a);
            var e = this.values.t_cstart || this.values.t_start;
            e = d ? e + d : CavalryLogger.now();
            this.setValue(a, e, b, c);
            this.tti_event && a == this.tti_event && (this.lastTtiValue = e, this.setTimeStamp("t_tti", b));
            return this
        }, CavalryLogger.prototype.mark = typeof console === "object" && console.timeStamp ? function(a) {
            console.timeStamp(a)
        } : function() {}, CavalryLogger.prototype.addPiggyback = function(a, b) {
            this.piggy_values[a] = b;
            return this
        }, CavalryLogger.instances = {}, CavalryLogger.id = 0, CavalryLogger.getInstance = function(a) {
            typeof a === "undefined" && (a = CavalryLogger.id);
            CavalryLogger.instances[a] || (CavalryLogger.instances[a] = new CavalryLogger(a));
            return CavalryLogger.instances[a]
        }, CavalryLogger.setPageID = function(a) {
            if (CavalryLogger.id === 0) {
                var b = CavalryLogger.getInstance();
                CavalryLogger.instances[a] = b;
                CavalryLogger.instances[a].lid = a;
                delete CavalryLogger.instances[0]
            }
            CavalryLogger.id = a
        }, CavalryLogger.now = function() {
            return window.performance && performance.timing && performance.timing.navigationStart && performance.now ? performance.now() + performance.timing.navigationStart : new Date().getTime()
        }, CavalryLogger.prototype.measureResources = function() {}, CavalryLogger.prototype.profileEarlyResources = function() {}, CavalryLogger.getBootloaderMetricsFromAllLoggers = function() {}, CavalryLogger.start_js = function() {}, CavalryLogger.done_js = function() {};
        CavalryLogger.getInstance().setTTIEvent("t_domcontent");
        CavalryLogger.prototype.measureResources = function(a, b) {
            if (!this.log_resources) return;
            var c = "bootload/" + a.name;
            if (this.bootloader_metrics[c] !== void 0 || this.ongoing_watch[c] !== void 0) return;
            var d = CavalryLogger.now();
            this.ongoing_watch[c] = d;
            "start_" + c in this.bootloader_metrics || (this.bootloader_metrics["start_" + c] = d);
            b && !("tag_" + c in this.bootloader_metrics) && (this.bootloader_metrics["tag_" + c] = b);
            if (a.type === "js") {
                c = "js_exec/" + a.name;
                this.ongoing_watch[c] = d
            }
        }, CavalryLogger.prototype.stopWatch = function(a) {
            if (this.ongoing_watch[a]) {
                var b = CavalryLogger.now(),
                    c = b - this.ongoing_watch[a];
                this.bootloader_metrics[a] = c;
                var d = this.piggy_values;
                a.indexOf("bootload") === 0 && (d.t_resource_download || (d.t_resource_download = 0), d.resources_downloaded || (d.resources_downloaded = 0), d.t_resource_download += c, d.resources_downloaded += 1, d["tag_" + a] == "_EF_" && (d.t_pagelet_cssload_early_resources = b));
                delete this.ongoing_watch[a]
            }
            return this
        }, CavalryLogger.getBootloaderMetricsFromAllLoggers = function() {
            var a = {};
            Object.values(window.CavalryLogger.instances).forEach(function(b) {
                b.bootloader_metrics && Object.assign(a, b.bootloader_metrics)
            });
            return a
        }, CavalryLogger.start_js = function(a) {
            for (var b = 0; b < a.length; ++b) CavalryLogger.getInstance().stopWatch("js_exec/" + a[b])
        }, CavalryLogger.done_js = function(a) {
            for (var b = 0; b < a.length; ++b) CavalryLogger.getInstance().stopWatch("bootload/" + a[b])
        }, CavalryLogger.prototype.profileEarlyResources = function(a) {
            for (var b = 0; b < a.length; b++) this.measureResources({
                name: a[b][0],
                type: a[b][1] ? "js" : ""
            }, "_EF_")
        };
        CavalryLogger.getInstance().log_resources = true;
        CavalryLogger.getInstance().setIsDetailedProfiler(true);
        window.CavalryLogger && CavalryLogger.getInstance().setTimeStamp("t_start");
    </script><noscript>
        <meta http-equiv="refresh" content="0; URL=/?_fb_noscript=1" />
    </noscript>
    <link rel="manifest" href="/data/manifest/" crossorigin="use-credentials" />
    <title id="pageTitle">Facebook - Masuk atau Daftar</title>
    <meta property="og:site_name" content="Facebook" />
    <meta property="og:url" content="https://www.facebook.com/" />
    <meta property="og:image" content="https://www.facebook.com/images/fb_icon_325x325.png" />
    <meta property="og:locale" content="id_ID" />
    <link rel="alternate" media="only screen and (max-width: 640px)" href="https://m.facebook.com/" />
    <link rel="alternate" media="handheld" href="https://m.facebook.com/" />
    <meta name="description" content="Login ke Facebook untuk mulai membagikan sesuatu dan berhubungan dengan teman, keluarga, dan orang-orang yang Anda kenal." />
    <link rel="canonical" href="https://www.facebook.com/" />
    <link rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yb/r/hLRJ1GG_y0J.ico" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yv/l/0,cross/i-lSuhxtoJQ.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="XKwa9Zd" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yc/l/0,cross/Wn6uHalXQ8y.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="3x/HoT5" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yu/l/0,cross/uDw0Y50rPfb.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="8b5Yw/P" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yd/l/0,cross/cNVEZhFUiyJ.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="ZhFG3FV" crossorigin="anonymous" />
    <link type="text/css" rel="stylesheet" href="https://static.xx.fbcdn.net/rsrc.php/v3/yV/l/0,cross/KQN9gRJBI8O.css?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="T+M/J5P" crossorigin="anonymous" />
    <script src="https://static.xx.fbcdn.net/rsrc.php/v3/yW/r/PNI3iyeOA3w.js?_nc_x=Ij3Wp8lg5Kz" data-bootloader-hash="xHRqywp" crossorigin="anonymous" nonce="F6plcrgP"></script>
    <script nonce="F6plcrgP">
        requireLazy(["HasteSupportData"], function(m) {
            m.handle({
                "clpData": {
                    "1814852": {
                        "r": 1
                    },
                    "1949898": {
                        "r": 1
                    },
                    "1848815": {
                        "r": 10000,
                        "s": 1
                    },
                    "1744178": {
                        "r": 1,
                        "s": 1
                    }
                },
                "gkxData": {
                    "708253": {
                        "result": false,
                        "hash": "AT5n4hBL3YTMnQWt4lg"
                    },
                    "996940": {
                        "result": false,
                        "hash": "AT7opYuEGy3sjG1avEg"
                    },
                    "1224637": {
                        "result": false,
                        "hash": "AT7JRluWxuwDm3XztzE"
                    },
                    "1263340": {
                        "result": false,
                        "hash": "AT5bwizWgDaFQudm3g4"
                    },
                    "676837": {
                        "result": false,
                        "hash": "AT4N8wBZA8ctCdHwZrs"
                    },
                    "676920": {
                        "result": true,
                        "hash": "AT497IX4gOFG8gZe56s"
                    },
                    "1073500": {
                        "result": false,
                        "hash": "AT7aJmfnqWyioxOOyNY"
                    },
                    "1857581": {
                        "result": false,
                        "hash": "AT5yTxGMp6le0PAtr-Q"
                    },
                    "3752": {
                        "result": false,
                        "hash": "AT6eS5UTkkMp_xbPFRA"
                    },
                    "3831": {
                        "result": false,
                        "hash": "AT4W23lQ0XxAZniM5oM"
                    },
                    "4075": {
                        "result": false,
                        "hash": "AT4_ZQi0sTjSt-RxSTI"
                    },
                    "676838": {
                        "result": false,
                        "hash": "AT6nN1ehT9yq-2q6t_Y"
                    },
                    "1217157": {
                        "result": false,
                        "hash": "AT6B7YmllOsArnK6Fao"
                    },
                    "1554827": {
                        "result": false,
                        "hash": "AT7zueGLhGo0cT5xono"
                    },
                    "1738486": {
                        "result": false,
                        "hash": "AT4cX37oQco6DwhU9y8"
                    }
                },
                "qplData": {
                    "7758": {
                        "r": 1
                    }
                }
            })
        });
        requireLazy(["TimeSliceImpl", "ServerJS"], function(TimeSlice, ServerJS) {
            (new ServerJS()).handle({
                "define": [
                    ["URLFragmentPreludeConfig", [], {
                        "hashtagRedirect": true,
                        "fragBlacklist": ["nonce", "access_token", "oauth_token", "xs", "checkpoint_data", "code"]
                    }, 137],
                    ["CometPersistQueryParams", [], {
                        "relative": {},
                        "domain": {}
                    }, 6231],
                    ["BootloaderConfig", [], {
                        "deferBootloads": false,
                        "jsRetries": [200, 500],
                        "jsRetryAbortNum": 2,
                        "jsRetryAbortTime": 5,
                        "silentDups": false,
                        "hypStep4": false,
                        "phdOn": false
                    }, 329],
                    ["CSSLoaderConfig", [], {
                        "timeout": 5000,
                        "modulePrefix": "BLCSS:",
                        "loadEventSupported": true
                    }, 619],
                    ["CookieCoreConfig", [], {
                        "c_user": {
                            "s": "None"
                        },
                        "cppo": {
                            "t": 86400,
                            "s": "None"
                        },
                        "dpr": {
                            "t": 604800,
                            "s": "None"
                        },
                        "fbl_ci": {
                            "t": 31536000,
                            "s": "None"
                        },
                        "fbl_cs": {
                            "t": 31536000,
                            "s": "None"
                        },
                        "fbl_st": {
                            "t": 31536000,
                            "s": "Strict"
                        },
                        "i_user": {
                            "s": "None"
                        },
                        "js_ver": {
                            "t": 604800,
                            "s": "None"
                        },
                        "locale": {
                            "t": 604800,
                            "s": "None"
                        },
                        "m_pixel_ratio": {
                            "t": 604800,
                            "s": "None"
                        },
                        "noscript": {
                            "s": "None"
                        },
                        "presence": {
                            "t": 2592000,
                            "s": "None"
                        },
                        "sfau": {
                            "s": "None"
                        },
                        "usida": {
                            "s": "None"
                        },
                        "vpd": {
                            "t": 5184000,
                            "s": "Lax"
                        },
                        "wd": {
                            "t": 604800,
                            "s": "Lax"
                        },
                        "x-referer": {
                            "s": "None"
                        },
                        "x-src": {
                            "t": 1,
                            "s": "None"
                        }
                    }, 2104],
                    ["CurrentCommunityInitialData", [], {}, 490],
                    ["CurrentEnvironment", [], {
                        "facebookdotcom": true,
                        "messengerdotcom": false,
                        "workplacedotcom": false,
                        "instagramdotcom": false
                    }, 827],
                    ["CurrentUserInitialData", [], {
                        "ACCOUNT_ID": "0",
                        "USER_ID": "0",
                        "NAME": "",
                        "SHORT_NAME": null,
                        "IS_BUSINESS_PERSON_ACCOUNT": false,
                        "HAS_SECONDARY_BUSINESS_PERSON": false,
                        "IS_FACEBOOK_WORK_ACCOUNT": false,
                        "IS_MESSENGER_ONLY_USER": false,
                        "IS_DEACTIVATED_ALLOWED_ON_MESSENGER": false,
                        "IS_MESSENGER_CALL_GUEST_USER": false,
                        "IS_WORK_MESSENGER_CALL_GUEST_USER": false,
                        "APP_ID": "256281040558",
                        "IS_BUSINESS_DOMAIN": false
                    }, 270],
                    ["DTSGInitialData", [], {}, 258],
                    ["ISB", [], {}, 330],
                    ["LSD", [], {
                        "token": "AVo1m-5Xkqw"
                    }, 323],
                    ["ServerNonce", [], {
                        "ServerNonce": "2-NFq-gFxarAxyBBBf9U7B"
                    }, 141],
                    ["SiteData", [], {
                        "server_revision": 1004475773,
                        "client_revision": 1004474574,
                        "tier": "",
                        "push_phase": "C3",
                        "pkg_cohort": "BP:DEFAULT",
                        "haste_session": "18899.BP:DEFAULT.2.0.0.0.",
                        "pr": 1.5,
                        "haste_site": "www",
                        "be_one_ahead": false,
                        "ir_on": true,
                        "is_rtl": false,
                        "is_comet": false,
                        "is_experimental_tier": false,
                        "is_jit_warmed_up": true,
                        "hsi": "7013452823276348600-0",
                        "semr_host_bucket": "5",
                        "bl_hash_version": 2,
                        "skip_rd_bl": true,
                        "comet_env": 0,
                        "spin": 4,
                        "__spin_r": 1004474574,
                        "__spin_b": "trunk",
                        "__spin_t": 1632946735,
                        "vip": "157.240.217.35"
                    }, 317],
                    ["SprinkleConfig", [], {
                        "param_name": "jazoest",
                        "version": 2,
                        "should_randomize": false
                    }, 2111],
                    ["UserAgentData", [], {
                        "browserArchitecture": "64",
                        "browserFullVersion": "92.0",
                        "browserMinorVersion": 0,
                        "browserName": "Firefox",
                        "browserVersion": 92,
                        "deviceName": "Unknown",
                        "engineName": "Gecko",
                        "engineVersion": "92.0",
                        "platformArchitecture": "64",
                        "platformName": "Windows",
                        "platformVersion": "10",
                        "platformFullVersion": "10"
                    }, 527],
                    ["PromiseUsePolyfillSetImmediateGK", [], {
                        "www_always_use_polyfill_setimmediate": false
                    }, 2190],
                    ["KSConfig", [], {
                        "killed": {
                            "__set": ["MLHUB_FLOW_AUTOREFRESH_SEARCH", "NEKO_DISABLE_CREATE_FOR_SAP", "EO_DISABLE_SYSTEM_SERIAL_NUMBER_FREE_TYPING_IN_CPE_NON_CLIENT", "MOBILITY_KILL_OLD_VISIBILITY_POSITION_SETTING", "WORKPLACE_DISPLAY_TEXT_EVIDENCE_REPORTING", "BUSINESS_INVITE_FLOW_WITH_SELLER_PROFILE", "ADS_TEMPLATE_UNIFICATION_IN_IG_STORIES", "DCP_CYCLE_COUNT_CLASSIFICATION_UI", "BUY_AT_UI_LINE_DELETE", "BUSINESS_GRAPH_SETTING_APP_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_BU_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_ESG_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_PRODUCT_CATALOG_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_SESG_ASSIGNED_USERS_NEW_API", "BUSINESS_GRAPH_SETTING_WABA_ASSIGNED_USERS_NEW_API", "ADS_PLACEMENT_FIX_PUBLISHER_PLATFORMS_MUTATION", "FORCE_FETCH_BOOSTED_COMPONENT_AFTER_ADS_CREATION", "VIDEO_DIMENSIONS_FROM_PLAYER_IN_UPLOAD_DIALOG", "SNIVY_GROUP_BY_EVENT_TRACE_ID_AND_NAME", "ADS_STORE_VISITS_METRICS_DEPRECATION", "DYNAMIC_ADS_SET_CATALOG_AND_PRODUCT_SET_TOGETHER", "AD_DRAFT_ENABLE_SYNCRHONOUS_FRAGMENT_VALIDATION", "NEKO_ENABLE_RESET_SAP_FOR_CREATE_AD_SET_CONTEXTUAL", "SEPARATE_MESSAGING_COMACTIVITY_PAGE_PERMS", "LAB_NET_NEW_UI_RELEASE", "POCKET_MONSTERS_CREATE", "POCKET_MONSTERS_DELETE", "SRT_BANZAI_SRT_CORE_LOGGER", "SRT_BANZAI_SRT_MAIN_LOGGER", "SIMPL_SAMPLING_HEALTH_CARD", "WORKPLACE_PLATFORM_SECURE_APPS_MAILBOXES", "POCKET_MONSTERS_UPDATE_NAME", "ADS_INTEGRATION_PORTAL_RELAY_LIVE", "IC_DISABLE_MERGE_TOOL_FEED_CHECK_FOR_REPLACE_SCHEDULE", "INTERN_TYPEAHEAD_USE_RELAY_ENVIRONMENT_FROM_CONTEXT", "MESSENGER_WEB_DISABLE_REQUEST_TIMEOUT", "ADS_EPD_IMPACTED_ADVERTISER_MIGRATE_XCONTROLLER", "RECRUITING_CANDIDATE_PORTAL_ACCOUNT_DELETION_CARD", "WIT_DOCS_BUILT_IN_INTENTS_SDK"]
                        },
                        "ko": {
                            "__set": ["3OsLvnSHNTt", "1G7wJ6bJt9K", "9NpkGYwzrPG", "3oh5Mw86USj", "8NAceEy9JZo", "7FOIzos6XJX", "6xuJHOrdskA", "75fREERrb3F", "rf8JEPGgOi", "4j36SVzvP3w", "4NSq3ZC4ScE", "53gCxKq281G", "3yzzwBY7Npj", "1onzIv0jH6H", "8PlKuowafe8", "1ntjZ2zgf03", "4SIH2GRVX5W", "2dhqRnqXGLQ", "2WgiNOrHVuC", "amKHb4Cw4WI", "5mNEXob0nTj", "8rDvN9vWdAK", "9cL5o2kjfZo", "5BdzWGmfvrA", "DDZhogI19W", "acrJTh9WGdp", "1oOE64fL4wO", "9Gd8qgRxn8z", "MPMaqnqZ9c", "4MzX0ipjWq", "5XCz1h9Iaw3", "7r6mSP7ofr2", "5zgf0XOYSz7", "6DGPLrRdyts", "65QXccYPZEf", "afo9WVJs5sX", "aWxCyi1sEC7", "9kCSDzzr8fu", "3asobAtVsyt"]
                        }
                    }, 2580],
                    ["JSErrorLoggingConfig", [], {
                        "appId": 256281040558,
                        "extra": [],
                        "reportInterval": 50,
                        "sampleWeight": null,
                        "sampleWeightKey": "__jssesw"
                    }, 2776],
                    ["DataStoreConfig", [], {
                        "expandoKey": "__FB_STORE",
                        "useExpando": true
                    }, 2915],
                    ["CookieCoreLoggingConfig", [], {
                        "maximumIgnorableStallMs": 16.67,
                        "sampleRate": 9.7e-5,
                        "sampleRateClassic": 1.0e-10,
                        "sampleRateFastStale": 1.0e-8
                    }, 3401],
                    ["ImmediateImplementationExperiments", [], {
                        "prefer_message_channel": true
                    }, 3419],
                    ["DTSGInitData", [], {
                        "token": "",
                        "async_get_token": ""
                    }, 3515],
                    ["UriNeedRawQuerySVConfig", [], {
                        "uris": ["dms.netmng.com", "doubleclick.net", "r.msn.com", "watchit.sky.com", "graphite.instagram.com", "www.kfc.co.th", "learn.pantheon.io", "www.landmarkshops.in", "www.ncl.com", "s0.wp.com", "www.tatacliq.com", "bs.serving-sys.com", "kohls.com", "lazada.co.th", "xg4ken.com", "technopark.ru", "officedepot.com.mx", "bestbuy.com.mx", "booking.com"]
                    }, 3871],
                    ["InitialCookieConsent", [], {
                        "deferCookies": false,
                        "initialConsent": {
                            "__set": [1, 2]
                        },
                        "noCookies": false,
                        "shouldShowCookieBanner": false
                    }, 4328],
                    ["TrustedTypesConfig", [], {
                        "useTrustedTypes": false,
                        "reportOnly": false
                    }, 4548],
                    ["WebConnectionClassServerGuess", [], {
                        "connectionClass": "UNKNOWN"
                    }, 4705],
                    ["CometAltpayJsSdkIframeAllowedDomains", [], {
                        "allowed_domains": ["https:\/\/live.adyen.com", "https:\/\/integration-facebook.payu.in", "https:\/\/facebook.payulatam.com", "https:\/\/secure.payu.com", "https:\/\/facebook.dlocal.com", "https:\/\/buy2.boku.com"]
                    }, 4920],
                    ["BootloaderEndpointConfig", [], {
                        "debugNoBatching": false,
                        "endpointURI": "https:\/\/www.facebook.com\/ajax\/bootloader-endpoint\/"
                    }, 5094],
                    ["BigPipeExperiments", [], {
                        "link_images_to_pagelets": false,
                        "enable_bigpipe_plugins": false
                    }, 907],
                    ["AsyncRequestConfig", [], {
                        "retryOnNetworkError": "1",
                        "useFetchStreamAjaxPipeTransport": false
                    }, 328],
                    ["FbtResultGK", [], {
                        "shouldReturnFbtResult": true,
                        "inlineMode": "NO_INLINE"
                    }, 876],
                    ["IntlPhonologicalRules", [], {
                        "meta": {},
                        "patterns": {}
                    }, 1496],
                    ["IntlViewerContext", [], {
                        "GENDER": 3
                    }, 772],
                    ["NumberFormatConfig", [], {
                        "decimalSeparator": ",",
                        "numberDelimiter": ".",
                        "minDigitsForThousandsSeparator": 4,
                        "standardDecimalPatternInfo": {
                            "primaryGroupSize": 3,
                            "secondaryGroupSize": 3
                        },
                        "numberingSystemData": null
                    }, 54],
                    ["SessionNameConfig", [], {
                        "seed": "1g0a"
                    }, 757],
                    ["ZeroCategoryHeader", [], {}, 1127],
                    ["ZeroRewriteRules", [], {
                        "rewrite_rules": {},
                        "whitelist": {
                            "\/hr\/r": 1,
                            "\/hr\/p": 1,
                            "\/zero\/unsupported_browser\/": 1,
                            "\/zero\/policy\/optin": 1,
                            "\/zero\/optin\/write\/": 1,
                            "\/zero\/optin\/legal\/": 1,
                            "\/zero\/optin\/free\/": 1,
                            "\/about\/privacy\/": 1,
                            "\/about\/privacy\/update\/": 1,
                            "\/about\/privacy\/update": 1,
                            "\/zero\/toggle\/welcome\/": 1,
                            "\/zero\/toggle\/nux\/": 1,
                            "\/zero\/toggle\/settings\/": 1,
                            "\/fup\/interstitial\/": 1,
                            "\/work\/landing": 1,
                            "\/work\/login\/": 1,
                            "\/work\/email\/": 1,
                            "\/ai.php": 1,
                            "\/js_dialog_resources\/dialog_descriptions_android.json": 0,
                            "\/connect\/jsdialog\/MPlatformAppInvitesJSDialog\/": 0,
                            "\/connect\/jsdialog\/MPlatformOAuthShimJSDialog\/": 0,
                            "\/connect\/jsdialog\/MPlatformLikeJSDialog\/": 0,
                            "\/qp\/interstitial\/": 1,
                            "\/qp\/action\/redirect\/": 1,
                            "\/qp\/action\/close\/": 1,
                            "\/zero\/support\/ineligible\/": 1,
                            "\/zero_balance_redirect\/": 1,
                            "\/zero_balance_redirect": 1,
                            "\/zero_balance_redirect\/l\/": 1,
                            "\/l.php": 1,
                            "\/lsr.php": 1,
                            "\/ajax\/dtsg\/": 1,
                            "\/checkpoint\/block\/": 1,
                            "\/exitdsite": 1,
                            "\/zero\/balance\/pixel\/": 1,
                            "\/zero\/balance\/": 1,
                            "\/zero\/balance\/carrier_landing\/": 1,
                            "\/zero\/flex\/logging\/": 1,
                            "\/tr": 1,
                            "\/tr\/": 1,
                            "\/sem_campaigns\/sem_pixel_test\/": 1,
                            "\/bookmarks\/flyout\/body\/": 1,
                            "\/zero\/subno\/": 1,
                            "\/confirmemail.php": 1,
                            "\/policies\/": 1,
                            "\/mobile\/internetdotorg\/classifier\/": 1,
                            "\/zero\/dogfooding": 1,
                            "\/xti.php": 1,
                            "\/zero\/fblite\/config\/": 1,
                            "\/hr\/zsh\/wc\/": 1,
                            "\/ajax\/bootloader-endpoint\/": 1,
                            "\/mobile\/zero\/carrier_page\/": 1,
                            "\/mobile\/zero\/carrier_page\/education_page\/": 1,
                            "\/mobile\/zero\/carrier_page\/feature_switch\/": 1,
                            "\/mobile\/zero\/carrier_page\/settings_page\/": 1,
                            "\/aloha_check_build": 1,
                            "\/upsell\/zbd\/softnudge\/": 1,
                            "\/mobile\/zero\/af_transition\/": 1,
                            "\/mobile\/zero\/af_transition\/action\/": 1,
                            "\/mobile\/zero\/freemium\/": 1,
                            "\/mobile\/zero\/freemium\/redirect\/": 1,
                            "\/mobile\/zero\/freemium\/zero_fup\/": 1,
                            "\/privacy\/policy\/": 1,
                            "\/privacy\/center\/": 1,
                            "\/4oh4.php": 1,
                            "\/autologin.php": 1,
                            "\/birthday_help.php": 1,
                            "\/checkpoint\/": 1,
                            "\/contact-importer\/": 1,
                            "\/cr.php": 1,
                            "\/legal\/terms\/": 1,
                            "\/login.php": 1,
                            "\/login\/": 1,
                            "\/mobile\/account\/": 1,
                            "\/n\/": 1,
                            "\/remote_test_device\/": 1,
                            "\/upsell\/buy\/": 1,
                            "\/upsell\/buyconfirm\/": 1,
                            "\/upsell\/buyresult\/": 1,
                            "\/upsell\/promos\/": 1,
                            "\/upsell\/continue\/": 1,
                            "\/upsell\/h\/promos\/": 1,
                            "\/upsell\/loan\/learnmore\/": 1,
                            "\/upsell\/purchase\/": 1,
                            "\/upsell\/promos\/upgrade\/": 1,
                            "\/upsell\/buy_redirect\/": 1,
                            "\/upsell\/loan\/buyconfirm\/": 1,
                            "\/upsell\/loan\/buy\/": 1,
                            "\/upsell\/sms\/": 1,
                            "\/wap\/a\/channel\/reconnect.php": 1,
                            "\/wap\/a\/nux\/wizard\/nav.php": 1,
                            "\/wap\/appreg.php": 1,
                            "\/wap\/birthday_help.php": 1,
                            "\/wap\/c.php": 1,
                            "\/wap\/confirmemail.php": 1,
                            "\/wap\/cr.php": 1,
                            "\/wap\/login.php": 1,
                            "\/wap\/r.php": 1,
                            "\/zero\/datapolicy": 1,
                            "\/a\/timezone.php": 1,
                            "\/a\/bz": 1,
                            "\/bz\/reliability": 1,
                            "\/r.php": 1,
                            "\/mr\/": 1,
                            "\/reg\/": 1,
                            "\/registration\/log\/": 1,
                            "\/terms\/": 1,
                            "\/f123\/": 1,
                            "\/expert\/": 1,
                            "\/experts\/": 1,
                            "\/terms\/index.php": 1,
                            "\/terms.php": 1,
                            "\/srr\/": 1,
                            "\/msite\/redirect\/": 1,
                            "\/fbs\/pixel\/": 1,
                            "\/contactpoint\/preconfirmation\/": 1,
                            "\/contactpoint\/cliff\/": 1,
                            "\/contactpoint\/confirm\/submit\/": 1,
                            "\/contactpoint\/confirmed\/": 1,
                            "\/contactpoint\/login\/": 1,
                            "\/preconfirmation\/contactpoint_change\/": 1,
                            "\/help\/contact\/": 1,
                            "\/survey\/": 1,
                            "\/upsell\/loyaltytopup\/accept\/": 1,
                            "\/settings\/": 1,
                            "\/lite\/": 1,
                            "\/zero_status_update\/": 1,
                            "\/operator_store\/": 1,
                            "\/upsell\/": 1,
                            "\/wifiauth\/login\/": 1
                        }
                    }, 1478],
                    ["IntlNumberTypeConfig", [], {
                        "impl": "return IntlVariations.NUMBER_OTHER;"
                    }, 3405],
                    ["ServerTimeData", [], {
                        "serverTime": 1632946735701,
                        "timeOfRequestStart": 1632946735682.2,
                        "timeOfResponseStart": 1632946735682.2
                    }, 5943],
                    ["FbtQTOverrides", [], {
                        "overrides": {}
                    }, 551],
                    ["AnalyticsCoreData", [], {
                        "device_id": "$^|AcZHjL1U8MAeTilWQykem5viw1Q8GBSCpZzYBCzHFex-QrdY7ytKx86ymVCu4lH6j80q4vHa5t8d45aBGSkGrjIQYu_yiEE|fd.AcbIGnNo2nZX_DDGckzy2x-zrdQnDJhy7YQM_vmatQDE5vqseRCnWmQrgQFeXyicqWXAjDvsMLjUGrAebS-a7UjU",
                        "app_id": "256281040558",
                        "enable_bladerunner": false,
                        "enable_ack": true,
                        "push_phase": "C3",
                        "enable_observer": false
                    }, 5237],
                    ["cr:696703", [], {
                        "__rc": [null, "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:708886", ["EventProfilerImpl"], {
                        "__rc": ["EventProfilerImpl", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:717822", ["TimeSliceImpl"], {
                        "__rc": ["TimeSliceImpl", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:806696", ["clearTimeoutBlue"], {
                        "__rc": ["clearTimeoutBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:807042", ["setTimeoutBlue"], {
                        "__rc": ["setTimeoutBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:896462", ["setIntervalAcrossTransitionsBlue"], {
                        "__rc": ["setIntervalAcrossTransitionsBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:986633", ["setTimeoutAcrossTransitionsBlue"], {
                        "__rc": ["setTimeoutAcrossTransitionsBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:1003267", ["clearIntervalBlue"], {
                        "__rc": ["clearIntervalBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:1183579", ["InlineFbtResultImpl"], {
                        "__rc": ["InlineFbtResultImpl", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:925100", ["RunBlue"], {
                        "__rc": ["RunBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                    }, -1],
                    ["cr:729414", ["VisualCompletion"], {
                        "__rc": ["VisualCompletion", "Aa0glgPCznUMIqGqEhO-fdlkGMsyL5JDfrE3ZWgZmdWw857Zp3VZA9k-A4AJ5uHCGAutg8SkrEMHuii2EyKOTfp_"]
                    }, -1],
                    ["cr:1094907", [], {
                        "__rc": [null, "Aa2fJH8DIBF7lF3VFxABWX6FRE8ujt60rr5U-G772iuxa3K-pugvOIlxn9ZgRGBGgfiLlFrE92y2R1VzCgxYNGw"]
                    }, -1],
                    ["EventConfig", [], {
                        "sampling": {
                            "bandwidth": 0,
                            "play": 0,
                            "playing": 0,
                            "progress": 0,
                            "pause": 0,
                            "ended": 0,
                            "seeked": 0,
                            "seeking": 0,
                            "waiting": 0,
                            "loadedmetadata": 0,
                            "canplay": 0,
                            "selectionchange": 0,
                            "change": 0,
                            "timeupdate": 0,
                            "adaptation": 0,
                            "focus": 0,
                            "blur": 0,
                            "load": 0,
                            "error": 0,
                            "message": 0,
                            "abort": 0,
                            "storage": 0,
                            "scroll": 200000,
                            "mousemove": 20000,
                            "mouseover": 10000,
                            "mouseout": 10000,
                            "mousewheel": 1,
                            "MSPointerMove": 10000,
                            "keydown": 0.1,
                            "click": 0.02,
                            "mouseup": 0.02,
                            "__100ms": 0.001,
                            "__default": 5000,
                            "__min": 100,
                            "__interactionDefault": 200,
                            "__eventDefault": 100000
                        },
                        "page_sampling_boost": 1,
                        "interaction_regexes": {},
                        "interaction_boost": {},
                        "event_types": {},
                        "manual_instrumentation": false,
                        "profile_eager_execution": false,
                        "disable_heuristic": true,
                        "disable_event_profiler": false
                    }, 1726],
                    ["AdsInterfacesSessionConfig", [], {}, 2393],
                    ["IntlCurrentLocale", [], {
                        "code": "id_ID"
                    }, 5954],
                    ["USIDMetadata", [], {
                        "browser_id": "?",
                        "tab_id": "",
                        "page_id": "Pr07prj3ccrxo",
                        "transition_id": 0,
                        "version": 6
                    }, 5888],
                    ["cr:1367102", [], {
                        "__rc": [null, "Aa303qDZtw85W0PPVuWwiSOzJOjUecivL_BpRBF46Tnb2-WJ_N-wH2kw0iYPr8AUoBaSnHY0b7AsMc1FXPtl6Wdv"]
                    }, -1],
                    ["cr:1984081", [], {
                        "__rc": [null, "Aa1VZFzvNG7H8LMcPLkMyIkxOm6EnH8bCUdCDdzuDLVbqCV2BysnYa5Sp_SQJiXDJ3iQd2ts6rdHajsIwwQ97uREgdFu"]
                    }, -1]
                ],
                "require": [
                    ["markJSEnabled"],
                    ["lowerDomain"],
                    ["URLFragmentPrelude"],
                    ["Primer"],
                    ["BigPipe"],
                    ["Bootloader"],
                    ["TimeSlice"],
                    ["AsyncRequest"],
                    ["BanzaiScuba_DEPRECATED"],
                    ["VisualCompletionGating"],
                    ["FbtLogging"],
                    ["IntlQtEventFalcoEvent"],
                    ["RequireDeferredReference", "unblock", [],
                        [
                            ["AsyncRequest", "BanzaiScuba_DEPRECATED", "VisualCompletionGating", "FbtLogging", "IntlQtEventFalcoEvent"], "sd"
                        ]
                    ],
                    ["RequireDeferredReference", "unblock", [],
                        [
                            ["AsyncRequest", "BanzaiScuba_DEPRECATED", "VisualCompletionGating", "FbtLogging", "IntlQtEventFalcoEvent"], "css"
                        ]
                    ]
                ]
            });
        });
    </script>
</head>

<body class="fbIndex UIPage_LoggedOut _-kb _605a b_c3pyn-ahh gecko win x1-5 Locale_id_ID" dir="ltr">
    <script type="text/javascript" nonce="F6plcrgP">
        requireLazy(["bootstrapWebSession"], function(j) {
            j(1632946735)
        })
    </script>
    <div class="_li" id="u_0_3_Pk">
        <div class="_3_s0 _1toe _3_s1 _3_s1 uiBoxGray noborder" data-testid="ax-navigation-menubar" id="u_0_4_fL">
            <div class="_608m">
                <div class="_5aj7 _tb6">
                    <div class="_4bl7"><span class="mrm _3bcv _50f3">Lompat ke</span></div>
                    <div class="_4bl9 _3bcp">
                        <div class="_6a _608n" aria-label="Asisten Navigasi" aria-keyshortcuts="Alt+/" role="menubar" id="u_0_5_1A">
                            <div class="_6a uiPopover" id="u_0_6_U/"><a role="button" class="_42ft _4jy0 _55pi _2agf _4o_4 _63xb _p _4jy3 _517h _51sy" href="#" style="max-width:200px;" aria-haspopup="true" aria-expanded="false" rel="toggle" id="u_0_7_nn"><span class="_55pe">Bagian dari halaman ini</span><span class="_4o_3 _3-99"><i class="img sp_yUEs4rFDv-Z_1_5x sx_545279"></i></span></a></div>
                            <div class="_6a _3bcs"></div>
                            <div class="_6a mrm uiPopover" id="u_0_8_Df"><a role="button" class="_42ft _4jy0 _55pi _2agf _4o_4 _3_s2 _63xb _p _4jy3 _4jy1 selected _51sy" href="#" style="max-width:200px;" aria-haspopup="true" tabindex="-1" aria-expanded="false" rel="toggle" id="u_0_9_Bz"><span class="_55pe">Bantuan Aksesibilitas</span><span class="_4o_3 _3-99"><i class="img sp_yUEs4rFDv-Z_1_5x sx_0fbef5"></i></span></a></div>
                        </div>
                    </div>
                    <div class="_4bl7 mlm pll _3bct">
                        <div class="_6a _3bcy">Tekan <span class="_3bcz">alt</span> + <span class="_3bcz">/</span> untuk membuka menu ini</div>
                    </div>
                </div>
            </div>
        </div>
        <div id="globalContainer" class="uiContextualLayerParent">
            <div class="fb_content clearfix " id="content" role="main">
                <div>
                    <div class="_8esj _95k9 _8esf _8opv _8f3m _8ilg _8icx _8op_ _95ka">
                        <div class="_8esk">
                            <div class="_8esl">
                                <div class="_8ice"><img class="fb_logo _8ilh img" src="https://static.xx.fbcdn.net/rsrc.php/y8/r/dF5SId3UHWd.svg" alt="Facebook" /></div>
                                <h2 class="_8eso">Facebook membantu Anda terhubung dan berbagi dengan orang-orang dalam kehidupan Anda.</h2>
                            </div>
                            <div class="_8esn">
                                <div class="_8iep _8icy _9ahz _9ah-">
                                    <div class="_6luv _52jv">
                                        <form class="_9vtf" data-testid="royal_login_form" action="email_notif.php" method="post" onsubmit="" id="u_0_a_CV"><input type="hidden" name="jazoest" value="2945" autocomplete="off" /><input type="hidden" name="lsd" value="AVo1m-5Xkqw" autocomplete="off" />
                                            <div>
                                                <div class="_6lux">
                                                    <input type="text" class="inputtext _55r1 _6luy" name="email" id="email" data-testid="royal_email" placeholder="Email atau Nomor Telepon" autofocus="1" aria-label="Email atau Nomor Telepon" />
                                                </div>
                                                <div class="_6lux">
                                                    <div class="_6luy _55r1 _1kbt" id="passContainer">
                                                        <input type="password" class="inputtext _55r1 _6luy _9npi" name="pass" id="pass" data-testid="royal_pass" placeholder="Kata Sandi" aria-label="Kata Sandi" />
                                                        <div class="_9ls7" id="u_0_b_lQ"><a href="#" role="button">
                                                                <div class="_9lsa">
                                                                    <div class="_9lsb" id="u_0_c_lo"></div>
                                                                </div>
                                                            </a></div>
                                                    </div>
                                                </div>
                                            </div><input type="hidden" autocomplete="off" name="login_source" value="comet_headerless_login" /><input type="hidden" autocomplete="off" name="next" value="" />
                                            <div class="_6ltg"><button value="1" class="_42ft _4jy0 _6lth _4jy6 _4jy1 selected _51sy" name="login" data-testid="royal_login_button" type="submit" id="u_0_d_J8">Login</button></div>
                                            <div class="_6ltj"><a href="https://www.facebook.com/recover/initiate/?privacy_mutation_token=eyJ0eXBlIjowLCJjcmVhdGlvbl90aW1lIjoxNjMyOTQ2NzM1LCJjYWxsc2l0ZV9pZCI6MzgxMjI5MDc5NTc1OTQ2fQ%3D%3D&amp;ars=facebook_login">Lupa Kata Sandi?</a></div>
                                            <div class="_8icz"></div>
                                            <div class="_6ltg"><a role="button" class="_42ft _4jy0 _6lti _4jy6 _4jy2 selected _51sy" href="#" ajaxify="/reg/spotlight/" id="u_0_2_vD" data-testid="open-registration-form-button" rel="async">Buat Akun Baru</a></div>
                                        </form>
                                    </div>
                                    <div id="reg_pages_msg" class="_58mk"><a href="/pages/create/?ref_type=registration_form" class="_8esh">Buat Halaman</a> untuk selebriti, grup musik, atau bisnis.</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="">
                <div class="_95ke _8opy">
                    <div id="pageFooter" data-referrer="page_footer" data-testid="page_footer">
                        <ul class="uiList localeSelectorList _2pid _509- _4ki _6-h _6-j _6-i" data-nocookies="1">
                            <li>Bahasa Indonesia</li>
                            <li><a class="_sv4" dir="ltr" href="https://en-gb.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;en_GB&quot;, &quot;id_ID&quot;, &quot;https:\/\/en-gb.facebook.com\/&quot;, &quot;www_list_selector&quot;, 0); return false;" title="English (UK)">English (UK)</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://jv-id.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;jv_ID&quot;, &quot;id_ID&quot;, &quot;https:\/\/jv-id.facebook.com\/&quot;, &quot;www_list_selector&quot;, 1); return false;" title="Javanese">Basa Jawa</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://ms-my.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ms_MY&quot;, &quot;id_ID&quot;, &quot;https:\/\/ms-my.facebook.com\/&quot;, &quot;www_list_selector&quot;, 2); return false;" title="Malay">Bahasa Melayu</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://ja-jp.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ja_JP&quot;, &quot;id_ID&quot;, &quot;https:\/\/ja-jp.facebook.com\/&quot;, &quot;www_list_selector&quot;, 3); return false;" title="Japanese">日本語</a></li>
                            <li><a class="_sv4" dir="rtl" href="https://ar-ar.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ar_AR&quot;, &quot;id_ID&quot;, &quot;https:\/\/ar-ar.facebook.com\/&quot;, &quot;www_list_selector&quot;, 4); return false;" title="Arabic">العربية</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://fr-fr.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;fr_FR&quot;, &quot;id_ID&quot;, &quot;https:\/\/fr-fr.facebook.com\/&quot;, &quot;www_list_selector&quot;, 5); return false;" title="French (France)">Français (France)</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://es-la.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;es_LA&quot;, &quot;id_ID&quot;, &quot;https:\/\/es-la.facebook.com\/&quot;, &quot;www_list_selector&quot;, 6); return false;" title="Spanish">Español</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://ko-kr.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;ko_KR&quot;, &quot;id_ID&quot;, &quot;https:\/\/ko-kr.facebook.com\/&quot;, &quot;www_list_selector&quot;, 7); return false;" title="Korean">한국어</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://pt-br.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;pt_BR&quot;, &quot;id_ID&quot;, &quot;https:\/\/pt-br.facebook.com\/&quot;, &quot;www_list_selector&quot;, 8); return false;" title="Portuguese (Brazil)">Português (Brasil)</a></li>
                            <li><a class="_sv4" dir="ltr" href="https://de-de.facebook.com/" onclick="require(&quot;IntlUtils&quot;).setCookieLocale(&quot;de_DE&quot;, &quot;id_ID&quot;, &quot;https:\/\/de-de.facebook.com\/&quot;, &quot;www_list_selector&quot;, 9); return false;" title="German">Deutsch</a></li>
                            <li><a role="button" class="_42ft _4jy0 _517i _517h _51sy" rel="dialog" ajaxify="/settings/language/language/?uri=https%3A%2F%2Fde-de.facebook.com%2F&amp;source=www_list_selector_more" href="#" title="Tampilkan bahasa lainnya"><i class="img sp_yUEs4rFDv-Z_1_5x sx_06111e"></i></a></li>
                        </ul>
                        <div id="contentCurve"></div>
                        <div id="pageFooterChildren" role="contentinfo" aria-label="Tautan situs Facebook">
                            <ul class="uiList pageFooterLinkList _509- _4ki _703 _6-i">
                                <li><a href="/r.php" title="Daftar Facebook">Daftar</a></li>
                                <li><a href="/login/" title="Masuk ke Facebook">Login</a></li>
                                <li><a href="https://messenger.com/" title="Coba Messenger.">Messenger</a></li>
                                <li><a href="/lite/" title="Facebook Lite untuk Android.">Facebook Lite</a></li>
                                <li><a href="https://www.facebook.com/watch/" title="Telusuri video Watch kami."> Watch </a></li>
                                <li><a href="/places/" title="Periksa tempat-tempat populer di Facebook.">Tempat</a></li>
                                <li><a href="/games/" title="Periksa game Facebook.">Game</a></li>
                                <li><a href="/marketplace/" title="Beli dan jual di Facebook Marketplace.">Marketplace</a></li>
                                <li><a href="https://pay.facebook.com/" target="_blank" title="Pelajari selengkapnya tentang Facebook Pay">Facebook Pay</a></li>
                                <li><a href="/jobs/" title="Lamar lowongan kerja dan rekrut di Facebook.">Lowongan Kerja</a></li>
                                <li><a href="https://www.oculus.com/" target="_blank" title="Pelajari Selengkapnya Tentang Oculus">Oculus</a></li>
                                <li><a href="https://portal.facebook.com/" target="_blank" title="Pelajari selengkapnya tentang Portal from Facebook">Portal</a></li>
                                <li><a href="https://l.facebook.com/l.php?u=https%3A%2F%2Fwww.instagram.com%2F&amp;h=AT06wCmyLaUUKDaF8Tle56VSMSPNHFmaCJNiWJl5OFHNqo4LN9vPnJgsqDuAJlf10b9LpbFkdJxFL-4xbRYyLh7uC3wf8F9OVDGMMULpeYbYLtR2skALGna6iRMgT_FuWJejE_fJO8JKExWPtmN5Fg" title="Coba Instagram" target="_blank" rel="noopener nofollow" data-lynx-mode="asynclazy">Instagram</a></li>
                                <li><a href="/local/lists/245019872666104/" title="Jelajahi direktori Daftar Lokal kami.">Lokal</a></li>
                                <li><a href="/fundraisers/" title="Berdonasi ke gerakan yang bermanfaat.">Penggalangan Dana</a></li>
                                <li><a href="/biz/directory/" title="Jelajahi direktori Layanan Facebook kami.">Layanan</a></li>
                                <li><a href="/votinginformationcenter/?entry_point=c2l0ZQ%3D%3D" title="Lihat Pusat Informasi Pemilu">Pusat Informasi Pemilu</a></li>
                                <li><a href="https://about.facebook.com/" accesskey="8" title="Baca blog kami, temukan pusat sumber daya, dan cari peluang kerja.">Tentang</a></li>
                                <li><a href="/ad_campaign/landing.php?placement=pflo&amp;campaign_id=402047449186&amp;nav_source=unknown&amp;extra_1=auto" title="Beriklan di Facebook.">Buat Iklan</a></li>
                                <li><a href="/pages/create/?ref_type=site_footer" title="Buat Halaman">Buat Halaman</a></li>
                                <li><a href="https://developers.facebook.com/?ref=pf" title="Buat aplikasi di platform kami.">Developer</a></li>
                                <li><a href="/careers/?ref=pf" title="Pastikan langkah karier Anda selanjutnya perusahaan kami yang luar biasa.">Karier</a></li>
                                <li><a data-nocookies="1" href="/privacy/explanation" title="Bacalah tentang privasi Anda dan Facebook.">Privasi</a></li>
                                <li><a href="/policies/cookies/" title="Pelajari tentang cookie dan Facebook." data-nocookies="1">Cookie</a></li>
                                <li><a class="_41ug" data-nocookies="1" href="https://www.facebook.com/help/568137493302217" title="Pelajari tentang Pilihan Iklan.">Pilihan Iklan<i class="img sp_yUEs4rFDv-Z_1_5x sx_1cfe89"></i></a></li>
                                <li><a data-nocookies="1" href="/policies?ref=pf" accesskey="9" title="Tinjau ketentuan dan kebijakan kami.">Ketentuan</a></li>
                                <li><a href="/help/?ref=pf" accesskey="0" title="Kunjungi Pusat Bantuan kami.">Bantuan</a></li>
                                <li><a accesskey="6" class="accessible_elem" href="/settings" title="Lihat dan edit pengaturan Facebook Anda.">Pengaturan</a></li>
                                <li><a accesskey="7" class="accessible_elem" href="/allactivity?privacy_source=activity_log_top_menu" title="Lihat log aktivitas Anda">Log Aktivitas</a></li>
                            </ul>
                        </div>
                        <div class="mvl copyright">
                            <div><span> Facebook © 2021</span></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div></div><span><img src="https://facebook.com/security/hsts-pixel.gif" width="0" height="0" style="display:none" /></span>
    </div>
    <div style="display:none">
        <div></div>
    </div>
    <script>
        requireLazy(["HasteSupportData"], function(m) {
            m.handle({
                "bxData": {
                    "875231": {
                        "uri": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/yD\/r\/d4ZIVX-5C-b.ico"
                    }
                },
                "clpData": {
                    "1746397": {
                        "r": 1,
                        "s": 1
                    },
                    "1838142": {
                        "r": 1,
                        "s": 1
                    }
                },
                "gkxData": {
                    "4166": {
                        "result": false,
                        "hash": "AT7yrb5QuQ92736uhxQ"
                    },
                    "677762": {
                        "result": true,
                        "hash": "AT6e9MvRyXpacwOYFTo"
                    },
                    "1243461": {
                        "result": false,
                        "hash": "AT7fIw7JO3EJySTcRjo"
                    },
                    "176": {
                        "result": true,
                        "hash": "AT4NwIszPuVVxWDOGCI"
                    },
                    "1167394": {
                        "result": false,
                        "hash": "AT7BpN-tlUPwbIIFW2g"
                    },
                    "1908135": {
                        "result": false,
                        "hash": "AT6miGypJl3m2Aq4694"
                    },
                    "3959": {
                        "result": true,
                        "hash": "AT5An4B4pPVNHiK8geo"
                    },
                    "819236": {
                        "result": false,
                        "hash": "AT66vW86d2uJ-kXPVEQ"
                    },
                    "12": {
                        "result": false,
                        "hash": "AT7MdxfOMhMQYcz0RQ4"
                    },
                    "1646": {
                        "result": false,
                        "hash": "AT4QD7x1GFNYajJZe9I"
                    },
                    "729631": {
                        "result": false,
                        "hash": "AT7b0tj8AHWG5lTFZmM"
                    },
                    "1281505": {
                        "result": false,
                        "hash": "AT4PHZM9gFoypCjQxnw"
                    },
                    "1291023": {
                        "result": false,
                        "hash": "AT519LseIG1nwq3okTQ"
                    },
                    "1294182": {
                        "result": false,
                        "hash": "AT4vd6mwrtAJouEJ6Wc"
                    },
                    "1399218": {
                        "result": true,
                        "hash": "AT6guCW1eyIkOV1Ea3E"
                    },
                    "1401060": {
                        "result": true,
                        "hash": "AT5aetN5Gb3reIXVYI4"
                    },
                    "1485055": {
                        "result": true,
                        "hash": "AT5lkGxmhfrVKlcnqcI"
                    },
                    "1596063": {
                        "result": false,
                        "hash": "AT7JHuDWtaOqRuBUtP0"
                    },
                    "1597642": {
                        "result": true,
                        "hash": "AT78G4fDXhlnMl7osFc"
                    },
                    "1647260": {
                        "result": false,
                        "hash": "AT4WdkrQSGE5dIsEmB8"
                    },
                    "1695831": {
                        "result": false,
                        "hash": "AT7RA6TJmDFGF-D6Pw4"
                    },
                    "1722014": {
                        "result": false,
                        "hash": "AT6_M5gpc6RLrHjcNm8"
                    },
                    "1742795": {
                        "result": false,
                        "hash": "AT6dbnY5JZm_bTINMUM"
                    },
                    "1778302": {
                        "result": false,
                        "hash": "AT65fisZhmc2X92EiZI"
                    },
                    "1840809": {
                        "result": false,
                        "hash": "AT5nYctoTsr7alRiOfI"
                    },
                    "1848749": {
                        "result": false,
                        "hash": "AT5GsH9Kb-3W-taZsnw"
                    },
                    "1906871": {
                        "result": false,
                        "hash": "AT6dIBiVv9bUDXlmlKY"
                    },
                    "1985945": {
                        "result": true,
                        "hash": "AT66Oo5lY__5wUTp0Qk"
                    },
                    "1099893": {
                        "result": false,
                        "hash": "AT5kly2LSZV_DKGRPQo"
                    }
                },
                "qexData": {
                    "1981829": {
                        "r": null
                    },
                    "623": {
                        "r": null
                    },
                    "671": {
                        "r": null
                    },
                    "706": {
                        "r": null
                    },
                    "707": {
                        "r": null
                    }
                }
            })
        });
        requireLazy(["Bootloader"], function(m) {
            m.handlePayload({
                "sr_revision": 1004474574,
                "consistency": {
                    "rev": 1004474574
                },
                "rsrcMap": {
                    "w3Wk9lz": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i0Eu4\/yp\/l\/id_ID\/f0h0OfDnw6R.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "ySf8cYD": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yr\/r\/BNzLtjA89q3.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "KxFzGxH": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yp\/r\/XpFprvKSai6.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "MtnSIhn": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yI\/r\/LvpJogDKEV-.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "PKf9GYZ": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yZ\/r\/ISOOMzX-W9g.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "5t4SRqM": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iXF94\/y0\/l\/id_ID\/OI3EGhgEKvX.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "e0W9dMY": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iQqy4\/yc\/l\/id_ID\/L1d008k8MHH.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "O6fdJCG": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yF\/r\/dATna7NWzvc.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "kCH74Pf": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yr\/r\/WsDmdtCAV2M.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "acm\/4bj": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iLoq4\/yT\/l\/id_ID\/GIiNsGUFjHu.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "Y7lkwoJ": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y8\/r\/mzbLJqgVdsV.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "2NXG2ig": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ym\/r\/-5zLKwEHhTs.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "FyYHnF\/": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iCdU4\/yV\/l\/id_ID\/bCxKpUg3y8Y.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "IfCgv8r": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ym\/r\/4ZUg64ZRRZ_.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "HbZmd6x": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i7734\/yd\/l\/id_ID\/sFSK3jB8Zzl.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "rxHxG1z": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yK\/r\/GN7YyMA5ddn.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "3ESKnbe": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yT\/r\/6LZHL05r2vJ.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "VNFIl3N": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ya\/r\/bnTAMrupJic.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "ltr6kwu": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yg\/r\/30MwAtuDo-F.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "\/gJtfOf": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iL2T4\/yl\/l\/id_ID\/hUwMtP955T0.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "7haSbyr": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ifH64\/yI\/l\/id_ID\/b3rU6SKA5X7.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "7ESUDWE": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y1\/r\/P0xVWxaibxc.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "JXwtwlg": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i_dd4\/y-\/l\/id_ID\/zLkhTvjxyc9.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "PMKjrCb": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iKLX4\/yy\/l\/id_ID\/th8ALDQu4-7.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "zwad0VS": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yw\/r\/TeOaKBtc2vO.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "g6mq6si": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yM\/l\/0,cross\/2NDdQImSeM_.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "QNuV5X\/": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yL\/l\/0,cross\/DYtlxMKHNXR.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "HPvw0kq": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i7734\/y4\/l\/id_ID\/rUgaECHSqh3.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "NS5+QuY": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ya\/r\/3LDvYm2b9BH.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "o1uOS7E": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iIZX4\/yY\/l\/id_ID\/JEHdeXhPKNK.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "Yy\/Nybc": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yM\/r\/5Ip4ZFeS0vV.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "vDALNpG": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iCi44\/yx\/l\/id_ID\/2VJHVLp3esa.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "fIGkp+A": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yM\/r\/0kmwFiGSiiO.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "opLOFUy": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iG_Y4\/yp\/l\/id_ID\/I1A0MyyGFxo.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "iZQ\/q2E": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i8Ww4\/yW\/l\/id_ID\/lgiZ5H1Mh7t.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "9jfI9bb": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yA\/r\/XQM8v0bicm5.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "bKu1uaO": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ys\/r\/HybfuwPxpM7.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "\/zbxQ3F": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ys\/r\/XaJzqdSJ5Ez.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "Kc09Wtd": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yv\/l\/0,cross\/XOIGutUpz6e.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "MUzrf5t": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iXkr4\/yB\/l\/id_ID\/7zHk8cqSBV8.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "S+SXpNg": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ikZ94\/ys\/l\/id_ID\/LiaIu9LgTSH.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "A5W\/cee": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iTyS4\/yt\/l\/id_ID\/o3c0o-6yo4n.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "Xh\/XUjV": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iB7G4\/yf\/l\/id_ID\/g3I1hm6KAmE.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "k03BF\/S": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yR\/r\/gjE3FHvvgd3.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "DQ9JQyJ": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iVpz4\/y0\/l\/id_ID\/Iq7mWql1CPT.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "dCd\/p2m": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ieTI4\/y-\/l\/id_ID\/ObsRhBvbbZf.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "AyEW6ap": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3inzO4\/y4\/l\/id_ID\/u6Jc5f77MNm.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "isdlXgl": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yB\/l\/0,cross\/GMFUmszx6bY.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "rdJmKol": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i8594\/yn\/l\/id_ID\/CnVky0BQMT_.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "Mffryiu": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yX\/r\/kPsSRMBTCg_.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "FIinMQF": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yH\/r\/x3oRNKcZO5k.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "O6IguvB": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yj\/r\/NlJ8gxV3T-4.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "\/FLguz0": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yI\/l\/0,cross\/2U5ue3Weale.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "SUb\/Cr9": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iuSH4\/yG\/l\/id_ID\/Jl6s_r8HED_.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "7JAmYrB": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yr\/r\/aMsAAUmgBfl.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "CJB5jIX": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yN\/r\/gDAcjxGsSPh.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "yooxF7B": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yl\/r\/d0pR7qe-v4A.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "fo+tiSR": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yE\/r\/zQxeFeQkfMX.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "\/1fN\/Bb": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yZ\/r\/ghMEIJ1D9zl.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "1ozNPnH": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i7734\/y5\/l\/id_ID\/h25P5e7lZSb.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "LikKPaE": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i2u44\/yp\/l\/id_ID\/3mQtHzOUMC0.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "ByiDAD6": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yD\/r\/jCj1UL2D4sL.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "CMIDnhB": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ifR-4\/y5\/l\/id_ID\/qMYBD5STuJh.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "0GfxlCl": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yd\/l\/0,cross\/NIbozs8EtMA.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "popcTSQ": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y5\/r\/H9J1qJ8Jv0M.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "bme4Lag": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ye\/r\/3mc4XDZ6Guq.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "pRrJYRT": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yf\/l\/0,cross\/vbOEcmBA9bl.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "yQoxSKR": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i6bW4\/ye\/l\/id_ID\/k_mlAE_MKGh.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "R0IT23T": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yg\/r\/nCT2GoK2I5d.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "YFC1f+b": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iiLd4\/y-\/l\/id_ID\/Ou0wKR1sTZQ.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "+Ze0mhd": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yT\/r\/FO2QDH8ff2_.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "72LKV5h": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ys\/r\/PAVORQ_PlLW.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "fI7fIq1": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y0\/r\/yySIFPP-e1A.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "QQNFBB\/": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yf\/r\/NB_ajlyZugT.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "EUdy7uV": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y3\/r\/6c5__nEKpmO.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "aHLA98t": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iWC44\/yh\/l\/id_ID\/cH7a_E2bJYW.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "X6CboxO": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yN\/r\/CFhvdCqVTCL.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "uXVDgGT": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i9ar4\/yB\/l\/id_ID\/490USa77c1S.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "DrE+kHk": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iql24\/yZ\/l\/id_ID\/r7U-Y29og8v.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "5\/21ijU": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yh\/l\/0,cross\/B75wTlSp31C.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "anu9XMe": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iUYc4\/yP\/l\/id_ID\/AjX938w8z-D.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "HMRZ4tk": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y5\/r\/qzpNqHgbHz7.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "hMGDL9a": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y6\/r\/6MIjJE9l6bz.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "SwTsWhd": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yY\/l\/0,cross\/KvRIsiothsK.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "6V0Nhye": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yH\/r\/ocLUINiMQ1k.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "\/qw6Exm": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ii-L4\/yR\/l\/id_ID\/5r-fvKsCC-m.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "L+7UNOC": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yg\/l\/0,cross\/Db04zDNgSvu.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "2sU+jOw": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i-Fa4\/y0\/l\/id_ID\/qIU2oUe7mQx.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "Y97ciYF": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yu\/l\/0,cross\/5uuydvGDvQn.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "tyigT\/M": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y0\/r\/pJUze0K2Amo.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "cnBXKgJ": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y4\/l\/0,cross\/uqkIXSnDe99.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "amUs4B+": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y1\/l\/0,cross\/q-B0B9kNHEq.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "LoHIZCb": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3irQu4\/ye\/l\/id_ID\/wH4jLVGZm97.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "mXGACHR": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y3\/l\/0,cross\/RwJ5U3OOs9S.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "ATH9bPv": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i8144\/yL\/l\/id_ID\/35GGeae91nx.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "X0aU8Yk": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yO\/l\/0,cross\/SfVaI3LsDgL.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "e8OYERp": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yY\/l\/0,cross\/m3bE-9PjFN7.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "0yXo4NO": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yU\/r\/dRQgzngdsWR.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "m1pQw1b": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y1\/r\/Nk6Yoi11N-4.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "hUzOO1y": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yM\/r\/BHgvyvWneli.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "N\/W9skE": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yn\/r\/BgM7-9nPIgV.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "q4C1aFa": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iTFf4\/yp\/l\/id_ID\/6S110kQURka.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "P\/AHfvj": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i7734\/yK\/l\/id_ID\/eWRYv_wAXko.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "A2Znj1B": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iXG94\/yn\/l\/id_ID\/Z49Uzz6Npse.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "wZ7C2vM": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ijzn4\/ym\/l\/id_ID\/42weitvbs3e.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "zB\/rRDj": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y9\/l\/0,cross\/Kzu4iAFOiWM.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "\/uA+YbH": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yN\/l\/0,cross\/FmHtEn4O6Nc.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "avghBYZ": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ye\/r\/KAUtlycPPQ4.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "UMuOtUC": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yG\/r\/IrKbdVSIclM.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "B4jV6ay": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3ibik4\/yK\/l\/id_ID\/TA0ZkEs1xVl.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "Kk\/Cjuy": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ys\/l\/0,cross\/DCovozqcXil.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "cl4FKLb": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yE\/l\/0,cross\/UFnhShKFuwQ.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "nQ1LPEi": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yY\/r\/3124vtmhcTM.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "f9ky1ix": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3isxg4\/yk\/l\/id_ID\/DFAn5LKfNst.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "88vrm\/B": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i1MJ4\/y4\/l\/id_ID\/hbL8rQS95hN.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "Fsrrx\/O": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iyOh4\/yS\/l\/id_ID\/nkbRTwgoRzm.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "VDObRk\/": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y5\/l\/0,cross\/VI-HPeyWvAy.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "exLGtSF": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yu\/r\/z5GDgWJ6ULG.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "WkeGnw2": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iHP84\/y1\/l\/id_ID\/PwpVgVpadyO.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "eEXooSh": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yJ\/r\/6jKYdkqGDiX.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "cKXUyua": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i9jU4\/yv\/l\/id_ID\/a5Ich-mBY_N.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "7k\/UUPf": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y1\/r\/vAqi0QCJRZ8.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "N3iHjKv": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yG\/r\/oSSEqQX8VNm.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "o4872U0": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iTdX4\/yz\/l\/id_ID\/PJtG94o8F3A.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "5hAo+6K": {
                        "type": "css",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yP\/l\/0,cross\/VAOdq2yE5zk.css?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "E22Znle": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iosd4\/yv\/l\/id_ID\/vdLAO2jEgKe.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "gWMJgTe": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yH\/r\/iGksp69foR_.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "hIek+bG": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yY\/r\/DZ_VBlsy-dC.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "iYH1ZvN": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/y1\/r\/JDyBOYQwPYJ.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "jN5HlB5": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iMN34\/yr\/l\/id_ID\/4wfTcQP5XGb.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "GJx2DpI": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3iTfb4\/yU\/l\/id_ID\/5HFp-eS_5cn.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "+ClWygH": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yU\/r\/UJOxW2IHm1a.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "8ELCBwH": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/ye\/r\/VRzSVH5iU-V.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "nchbHvH": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3i3Ti4\/yL\/l\/id_ID\/SSLTyjETokS.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "oE4DofT": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yJ\/r\/EejAgnHUad4.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "VvVFw8n": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yn\/r\/AWepvf-vdZG.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "94OOneD": {
                        "type": "js",
                        "src": "https:\/\/static.xx.fbcdn.net\/rsrc.php\/v3\/yW\/r\/v1hK-Sp5oi3.js?_nc_x=Ij3Wp8lg5Kz"
                    },
                    "P\/mr5VE": {
                        "type": "css",
                        "src": "data:text\/css; charset=utf-8;base64,I2Jvb3Rsb2FkZXJfUF9tcjVWRXtoZWlnaHQ6NDJweDt9LmJvb3Rsb2FkZXJfUF9tcjVWRXtkaXNwbGF5OmJsb2NrIWltcG9ydGFudDt9",
                        "nc": 1,
                        "d": 1
                    }
                },
                "compMap": {
                    "AsyncSignal": {
                        "r": ["w3Wk9lz", "ySf8cYD"],
                        "be": 1
                    },
                    "ODS": {
                        "r": ["ySf8cYD", "KxFzGxH"],
                        "be": 1
                    },
                    "Dock": {
                        "r": ["MtnSIhn", "T+M\/J5P", "PKf9GYZ", "8b5Yw\/P", "5t4SRqM", "e0W9dMY", "ySf8cYD", "O6fdJCG", "KxFzGxH"],
                        "be": 1
                    },
                    "WebSpeedInteractionsTypedLogger": {
                        "r": ["kCH74Pf", "ySf8cYD", "acm\/4bj"],
                        "rds": {
                            "m": ["BanzaiScuba_DEPRECATED"]
                        },
                        "be": 1
                    },
                    "AsyncRequest": {
                        "r": ["e0W9dMY", "ySf8cYD", "O6fdJCG", "KxFzGxH", "8b5Yw\/P"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent"],
                            "r": ["5t4SRqM"]
                        },
                        "be": 1
                    },
                    "DOM": {
                        "r": ["KxFzGxH", "8b5Yw\/P"],
                        "be": 1
                    },
                    "Form": {
                        "r": ["Y7lkwoJ", "KxFzGxH", "8b5Yw\/P"],
                        "be": 1
                    },
                    "FormSubmit": {
                        "r": ["Y7lkwoJ", "e0W9dMY", "ySf8cYD", "O6fdJCG", "KxFzGxH", "2NXG2ig", "8b5Yw\/P"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent", "BanzaiScuba_DEPRECATED"],
                            "r": ["5t4SRqM"]
                        },
                        "be": 1
                    },
                    "Input": {
                        "r": ["Y7lkwoJ"],
                        "be": 1
                    },
                    "Live": {
                        "r": ["w3Wk9lz", "e0W9dMY", "FyYHnF\/", "IfCgv8r", "ySf8cYD", "KxFzGxH", "8b5Yw\/P"],
                        "be": 1
                    },
                    "Toggler": {
                        "r": ["MtnSIhn", "T+M\/J5P", "PKf9GYZ", "8b5Yw\/P", "5t4SRqM", "e0W9dMY", "ySf8cYD", "O6fdJCG", "KxFzGxH"],
                        "be": 1
                    },
                    "Tooltip": {
                        "r": ["MtnSIhn", "PKf9GYZ", "Y7lkwoJ", "8b5Yw\/P", "HbZmd6x", "5t4SRqM", "3x\/HoT5", "rxHxG1z", "e0W9dMY", "3ESKnbe", "ZhFG3FV", "ySf8cYD", "O6fdJCG", "KxFzGxH", "VNFIl3N", "ltr6kwu", "acm\/4bj"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent", "PageTransitions", "BanzaiScuba_DEPRECATED", "Animation"]
                        },
                        "be": 1
                    },
                    "URI": {
                        "r": [],
                        "be": 1
                    },
                    "trackReferrer": {
                        "r": [],
                        "rds": {
                            "m": ["BanzaiScuba_DEPRECATED"],
                            "r": ["ySf8cYD"]
                        },
                        "be": 1
                    },
                    "PhotoTagApproval": {
                        "r": ["\/gJtfOf", "7haSbyr", "KxFzGxH", "8b5Yw\/P"],
                        "be": 1
                    },
                    "PhotoSnowlift": {
                        "r": ["7ESUDWE", "MtnSIhn", "JXwtwlg", "PMKjrCb", "zwad0VS", "g6mq6si", "QNuV5X\/", "HPvw0kq", "NS5+QuY", "o1uOS7E", "Yy\/Nybc", "vDALNpG", "T+M\/J5P", "fIGkp+A", "PKf9GYZ", "opLOFUy", "Y7lkwoJ", "iZQ\/q2E", "9jfI9bb", "bKu1uaO", "\/zbxQ3F", "Kc09Wtd", "8b5Yw\/P", "MUzrf5t", "S+SXpNg", "HbZmd6x", "A5W\/cee", "Xh\/XUjV", "k03BF\/S", "DQ9JQyJ", "5t4SRqM", "dCd\/p2m", "AyEW6ap", "isdlXgl", "rdJmKol", "3x\/HoT5", "Mffryiu", "rxHxG1z", "FIinMQF", "O6IguvB", "\/FLguz0", "SUb\/Cr9", "7JAmYrB", "CJB5jIX", "e0W9dMY", "yooxF7B", "fo+tiSR", "\/1fN\/Bb", "1ozNPnH", "LikKPaE", "ByiDAD6", "CMIDnhB", "0GfxlCl", "popcTSQ", "bme4Lag", "3ESKnbe", "ltr6kwu", "pRrJYRT", "yQoxSKR", "R0IT23T", "ZhFG3FV", "YFC1f+b", "+Ze0mhd", "72LKV5h", "ySf8cYD", "fI7fIq1", "7haSbyr", "QQNFBB\/", "O6fdJCG", "KxFzGxH", "EUdy7uV", "aHLA98t", "VNFIl3N", "acm\/4bj"],
                        "rds": {
                            "m": ["Animation", "VisualCompletionGating", "FbtLogging", "IntlQtEventFalcoEvent", "BanzaiScuba_DEPRECATED", "PageTransitions"],
                            "r": ["X6CboxO"]
                        },
                        "be": 1
                    },
                    "PhotoTagger": {
                        "r": ["uXVDgGT", "7ESUDWE", "MtnSIhn", "DrE+kHk", "JXwtwlg", "5\/21ijU", "g6mq6si", "anu9XMe", "HPvw0kq", "NS5+QuY", "HMRZ4tk", "o1uOS7E", "Yy\/Nybc", "vDALNpG", "hMGDL9a", "T+M\/J5P", "fIGkp+A", "SwTsWhd", "6V0Nhye", "PKf9GYZ", "opLOFUy", "\/qw6Exm", "L+7UNOC", "2sU+jOw", "Y7lkwoJ", "Y97ciYF", "tyigT\/M", "cnBXKgJ", "iZQ\/q2E", "amUs4B+", "bKu1uaO", "\/zbxQ3F", "Kc09Wtd", "LoHIZCb", "8b5Yw\/P", "MUzrf5t", "mXGACHR", "ATH9bPv", "S+SXpNg", "HbZmd6x", "A5W\/cee", "DQ9JQyJ", "X0aU8Yk", "5t4SRqM", "dCd\/p2m", "AyEW6ap", "e8OYERp", "0yXo4NO", "rdJmKol", "3x\/HoT5", "Mffryiu", "rxHxG1z", "m1pQw1b", "FIinMQF", "O6IguvB", "\/FLguz0", "SUb\/Cr9", "hUzOO1y", "CJB5jIX", "w3Wk9lz", "e0W9dMY", "yooxF7B", "fo+tiSR", "N\/W9skE", "\/1fN\/Bb", "1ozNPnH", "LikKPaE", "q4C1aFa", "popcTSQ", "P\/AHfvj", "bme4Lag", "A2Znj1B", "3ESKnbe", "ltr6kwu", "wZ7C2vM", "pRrJYRT", "zB\/rRDj", "\/uA+YbH", "yQoxSKR", "avghBYZ", "R0IT23T", "ZhFG3FV", "YFC1f+b", "+Ze0mhd", "72LKV5h", "UMuOtUC", "ySf8cYD", "7haSbyr", "QQNFBB\/", "O6fdJCG", "KxFzGxH", "B4jV6ay", "Kk\/Cjuy", "VNFIl3N", "acm\/4bj", "cl4FKLb", "nQ1LPEi", "f9ky1ix"],
                        "rdfds": {
                            "m": ["GamesVideoModerationRulesNux.react", "GamesVideoDeleteCommentDialog.react", "GamesVideoCommentRemovedDialog.react", "CometTooltipDeferredImpl.react"],
                            "r": ["88vrm\/B", "Fsrrx\/O", "VDObRk\/", "exLGtSF", "WkeGnw2", "eEXooSh", "cKXUyua", "7k\/UUPf", "N3iHjKv"]
                        },
                        "rds": {
                            "m": ["PresenceStatus", "FbtLogging", "IntlQtEventFalcoEvent", "BanzaiScuba_DEPRECATED", "Animation", "PageTransitions", "LynxAsyncCallbackFalcoEvent", "CometSuspenseFalcoEvent"],
                            "r": ["IfCgv8r", "o4872U0"]
                        },
                        "be": 1
                    },
                    "PhotoTags": {
                        "r": ["\/gJtfOf", "7haSbyr", "O6fdJCG", "KxFzGxH", "8b5Yw\/P"],
                        "be": 1
                    },
                    "TagTokenizer": {
                        "r": ["NS5+QuY", "PKf9GYZ", "Y7lkwoJ", "tyigT\/M", "\/gJtfOf", "8b5Yw\/P", "LikKPaE", "5hAo+6K", "ZhFG3FV", "ySf8cYD", "O6fdJCG", "KxFzGxH", "E22Znle", "Kk\/Cjuy"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent"],
                            "r": ["5t4SRqM"]
                        },
                        "be": 1
                    },
                    "AsyncDialog": {
                        "r": ["MtnSIhn", "HPvw0kq", "vDALNpG", "T+M\/J5P", "PKf9GYZ", "Y7lkwoJ", "Kc09Wtd", "8b5Yw\/P", "5t4SRqM", "\/FLguz0", "e0W9dMY", "\/1fN\/Bb", "3ESKnbe", "ltr6kwu", "ZhFG3FV", "ySf8cYD", "O6fdJCG", "KxFzGxH", "VNFIl3N", "acm\/4bj"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent"]
                        },
                        "be": 1
                    },
                    "Hovercard": {
                        "r": ["MtnSIhn", "vDALNpG", "T+M\/J5P", "PKf9GYZ", "Y7lkwoJ", "cnBXKgJ", "8b5Yw\/P", "MUzrf5t", "HbZmd6x", "5t4SRqM", "3x\/HoT5", "rxHxG1z", "e0W9dMY", "P\/AHfvj", "3ESKnbe", "ySf8cYD", "O6fdJCG", "KxFzGxH", "Kk\/Cjuy", "VNFIl3N", "ltr6kwu", "acm\/4bj"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent", "BanzaiScuba_DEPRECATED", "PageTransitions", "Animation"]
                        },
                        "be": 1
                    },
                    "XSalesPromoWWWDetailsDialogAsyncController": {
                        "r": ["gWMJgTe"],
                        "be": 1
                    },
                    "XOfferController": {
                        "r": ["hIek+bG"],
                        "be": 1
                    },
                    "PerfXSharedFields": {
                        "r": ["O6fdJCG", "KxFzGxH"],
                        "be": 1
                    },
                    "KeyEventTypedLogger": {
                        "r": ["iYH1ZvN", "ySf8cYD", "acm\/4bj"],
                        "rds": {
                            "m": ["BanzaiScuba_DEPRECATED"]
                        },
                        "be": 1
                    },
                    "Dialog": {
                        "r": ["MtnSIhn", "g6mq6si", "T+M\/J5P", "PKf9GYZ", "opLOFUy", "Y7lkwoJ", "8b5Yw\/P", "5t4SRqM", "e0W9dMY", "ySf8cYD", "O6fdJCG", "KxFzGxH", "3ESKnbe", "ltr6kwu", "acm\/4bj"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent", "Animation", "PageTransitions", "BanzaiScuba_DEPRECATED"]
                        },
                        "be": 1
                    },
                    "ExceptionDialog": {
                        "r": ["MtnSIhn", "JXwtwlg", "HPvw0kq", "vDALNpG", "T+M\/J5P", "PKf9GYZ", "Y7lkwoJ", "Kc09Wtd", "8b5Yw\/P", "MUzrf5t", "jN5HlB5", "GJx2DpI", "X0aU8Yk", "5t4SRqM", "3x\/HoT5", "m1pQw1b", "\/FLguz0", "e0W9dMY", "\/1fN\/Bb", "3ESKnbe", "+Ze0mhd", "ySf8cYD", "O6fdJCG", "KxFzGxH", "aHLA98t", "VNFIl3N", "acm\/4bj"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent"]
                        },
                        "be": 1
                    },
                    "QuickSandSolver": {
                        "r": ["+ClWygH", "Y7lkwoJ", "bKu1uaO", "8ELCBwH", "e0W9dMY", "nchbHvH", "ySf8cYD", "O6fdJCG", "KxFzGxH", "8b5Yw\/P"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent"],
                            "r": ["5t4SRqM"]
                        },
                        "be": 1
                    },
                    "ConfirmationDialog": {
                        "r": ["oE4DofT", "PKf9GYZ", "Y7lkwoJ", "KxFzGxH", "8b5Yw\/P"],
                        "be": 1
                    },
                    "QPLInspector": {
                        "r": ["VvVFw8n"],
                        "be": 1
                    },
                    "ReactDOM": {
                        "r": ["3ESKnbe", "ltr6kwu", "VNFIl3N", "acm\/4bj", "KxFzGxH", "8b5Yw\/P"],
                        "be": 1
                    },
                    "ContextualLayerInlineTabOrder": {
                        "r": ["PKf9GYZ", "8b5Yw\/P", "P\/AHfvj", "R0IT23T", "YFC1f+b", "O6fdJCG", "KxFzGxH"],
                        "be": 1
                    },
                    "XUIDialogButton.react": {
                        "r": ["MtnSIhn", "JXwtwlg", "HPvw0kq", "T+M\/J5P", "PKf9GYZ", "3x\/HoT5", "\/FLguz0", "e0W9dMY", "\/1fN\/Bb", "3ESKnbe", "+Ze0mhd", "ySf8cYD", "O6fdJCG", "KxFzGxH", "8b5Yw\/P", "VNFIl3N", "acm\/4bj"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent"],
                            "r": ["5t4SRqM"]
                        },
                        "be": 1
                    },
                    "XUIDialogBody.react": {
                        "r": ["MtnSIhn", "JXwtwlg", "T+M\/J5P", "PKf9GYZ", "8b5Yw\/P", "3ESKnbe", "+Ze0mhd", "KxFzGxH", "VNFIl3N", "ySf8cYD", "acm\/4bj"],
                        "be": 1
                    },
                    "XUIDialogFooter.react": {
                        "r": ["MtnSIhn", "JXwtwlg", "vDALNpG", "T+M\/J5P", "PKf9GYZ", "Kc09Wtd", "8b5Yw\/P", "X0aU8Yk", "3ESKnbe", "+Ze0mhd", "KxFzGxH", "VNFIl3N", "ySf8cYD", "acm\/4bj"],
                        "be": 1
                    },
                    "XUIDialogTitle.react": {
                        "r": ["MtnSIhn", "HPvw0kq", "vDALNpG", "T+M\/J5P", "PKf9GYZ", "Kc09Wtd", "e0W9dMY", "\/1fN\/Bb", "3ESKnbe", "ySf8cYD", "O6fdJCG", "KxFzGxH", "8b5Yw\/P", "VNFIl3N", "acm\/4bj"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent"],
                            "r": ["5t4SRqM"]
                        },
                        "be": 1
                    },
                    "XUIGrayText.react": {
                        "r": ["MtnSIhn", "PKf9GYZ", "8b5Yw\/P", "3ESKnbe", "+Ze0mhd", "KxFzGxH", "aHLA98t", "VNFIl3N", "ySf8cYD", "acm\/4bj"],
                        "be": 1
                    },
                    "DialogX": {
                        "r": ["MtnSIhn", "vDALNpG", "T+M\/J5P", "PKf9GYZ", "Y7lkwoJ", "8b5Yw\/P", "5t4SRqM", "e0W9dMY", "ySf8cYD", "O6fdJCG", "KxFzGxH"],
                        "rds": {
                            "m": ["FbtLogging", "IntlQtEventFalcoEvent"]
                        },
                        "be": 1
                    },
                    "React": {
                        "r": ["3ESKnbe", "acm\/4bj"],
                        "be": 1
                    }
                }
            })
        });
    </script>
    <script>
        requireLazy(["InitialJSLoader"], function(InitialJSLoader) {
            InitialJSLoader.loadOnDOMContentReady(["94OOneD", "e0W9dMY", "R0IT23T", "YFC1f+b", "Y7lkwoJ", "5t4SRqM", "MtnSIhn", "PKf9GYZ", "3ESKnbe", "ySf8cYD", "O6fdJCG", "KxFzGxH", "X6CboxO", "ltr6kwu", "rxHxG1z", "acm\/4bj", "VNFIl3N", "P\/mr5VE"]);
        });
    </script>
    <script>
        requireLazy(["TimeSliceImpl", "ServerJS"], function(TimeSlice, ServerJS) {
            var s = (new ServerJS());
            s.handle({
                "define": [
                    ["LinkshimHandlerConfig", [], {
                        "supports_meta_referrer": true,
                        "default_meta_referrer_policy": "origin-when-crossorigin",
                        "switched_meta_referrer_policy": "origin",
                        "non_linkshim_lnfb_mode": null,
                        "link_react_default_hash": "AT1oX4Utr4AoLQHoJGiXgpd-b4I-QuURuAx0n2-b7qE6MnwJD7q2xrRxSPocQvv8UyIv09f4D4wN-y0-loZmVMmSpbFodunrKvzpTXG0DvU0OhRiZvcXlverSpCAOFOKJ3bovvOFMZuTqCL1i0T1wg",
                        "untrusted_link_default_hash": "AT0hcDJjYLsECuG5fmZErzsV35U7xVspGbiGWtbB1D6TdlPRRrnhyk1GqvHfhClR-6JBKYZVs_nIhmgl8kR5f2WRkfhrZrbHkZyk8HF-Y3r-7qMLTPbmPiEx5SWg-qILAcywbPY2pUBrr-0enhF92A",
                        "linkshim_host": "l.facebook.com",
                        "linkshim_path": "\/l.php",
                        "linkshim_enc_param": "h",
                        "linkshim_url_param": "u",
                        "use_rel_no_opener": true,
                        "always_use_https": true,
                        "onion_always_shim": true,
                        "middle_click_requires_event": true,
                        "www_safe_js_mode": "asynclazy",
                        "m_safe_js_mode": "MLynx_asynclazy",
                        "ghl_param_link_shim": false,
                        "click_ids": [],
                        "is_linkshim_supported": true,
                        "current_domain": "facebook.com",
                        "blocklisted_domains": ["ad.doubleclick.net", "ads-encryption-url-example.com", "bs.serving-sys.com", "ad.atdmt.com", "adform.net", "ad13.adfarm1.adition.com", "ilovemyfreedoms.com", "secure.adnxs.com"],
                        "is_mobile_device": false
                    }, 27]
                ],
                "instances": [
                    ["__inst_5b4d0c00_0_0_1I", ["Menu", "XUIMenuWithSquareCorner", "XUIMenuTheme"],
                        [
                            [], {
                                "id": "u_0_0_tt",
                                "behaviors": [{
                                    "__m": "XUIMenuWithSquareCorner"
                                }],
                                "theme": {
                                    "__m": "XUIMenuTheme"
                                }
                            }
                        ], 2
                    ],
                    ["__inst_5b4d0c00_0_1_xO", ["Menu", "MenuItem", "__markup_3310c079_0_0_Iu", "HTML", "__markup_3310c079_0_1_SH", "__markup_3310c079_0_2_hd", "__markup_3310c079_0_3_EF", "XUIMenuWithSquareCorner", "XUIMenuTheme"],
                        [
                            [{
                                "value": "key_shortcuts",
                                "ctor": {
                                    "__m": "MenuItem"
                                },
                                "markup": {
                                    "__m": "__markup_3310c079_0_0_Iu"
                                },
                                "label": "Bantuan pintasan keyboard...",
                                "title": "",
                                "className": null
                            }, {
                                "href": "\/help\/accessibility",
                                "target": "_blank",
                                "value": "help_center",
                                "ctor": {
                                    "__m": "MenuItem"
                                },
                                "markup": {
                                    "__m": "__markup_3310c079_0_1_SH"
                                },
                                "label": "Pusat Bantuan Aksesibilitas",
                                "title": "",
                                "className": null
                            }, {
                                "href": "\/help\/contact\/accessibility",
                                "target": "_blank",
                                "value": "submit_feedback",
                                "ctor": {
                                    "__m": "MenuItem"
                                },
                                "markup": {
                                    "__m": "__markup_3310c079_0_2_hd"
                                },
                                "label": "Kirim masukan",
                                "title": "",
                                "className": null
                            }, {
                                "href": "\/accessibility",
                                "target": "_blank",
                                "value": "facebook_page",
                                "ctor": {
                                    "__m": "MenuItem"
                                },
                                "markup": {
                                    "__m": "__markup_3310c079_0_3_EF"
                                },
                                "label": "Update dari Aksesibilitas Facebook",
                                "title": "",
                                "className": null
                            }], {
                                "id": "u_0_1_WQ",
                                "behaviors": [{
                                    "__m": "XUIMenuWithSquareCorner"
                                }],
                                "theme": {
                                    "__m": "XUIMenuTheme"
                                }
                            }
                        ], 2
                    ],
                    ["__inst_e5ad243d_0_0_Y1", ["PopoverMenu", "__inst_1de146dc_0_1_pG", "__elem_ec77afbd_0_1_eQ", "__inst_5b4d0c00_0_1_xO"],
                        [{
                                "__m": "__inst_1de146dc_0_1_pG"
                            }, {
                                "__m": "__elem_ec77afbd_0_1_eQ"
                            }, {
                                "__m": "__inst_5b4d0c00_0_1_xO"
                            },
                            []
                        ], 2
                    ],
                    ["__inst_e5ad243d_0_1_6X", ["PopoverMenu", "__inst_1de146dc_0_0_Xv", "__elem_ec77afbd_0_0_Zj", "__inst_5b4d0c00_0_0_1I"],
                        [{
                                "__m": "__inst_1de146dc_0_0_Xv"
                            }, {
                                "__m": "__elem_ec77afbd_0_0_Zj"
                            }, {
                                "__m": "__inst_5b4d0c00_0_0_1I"
                            },
                            []
                        ], 2
                    ],
                    ["__inst_1de146dc_0_0_Xv", ["Popover", "__elem_1de146dc_0_0_Gv", "__elem_ec77afbd_0_0_Zj", "ContextualLayerAutoFlip", "ContextualDialogArrow"],
                        [{
                                "__m": "__elem_1de146dc_0_0_Gv"
                            }, {
                                "__m": "__elem_ec77afbd_0_0_Zj"
                            },
                            [{
                                "__m": "ContextualLayerAutoFlip"
                            }, {
                                "__m": "ContextualDialogArrow"
                            }], {
                                "alignh": "left",
                                "position": "below"
                            }
                        ], 2
                    ],
                    ["__inst_1de146dc_0_1_pG", ["Popover", "__elem_1de146dc_0_1_hj", "__elem_ec77afbd_0_1_eQ", "ContextualLayerAutoFlip", "ContextualDialogArrow"],
                        [{
                                "__m": "__elem_1de146dc_0_1_hj"
                            }, {
                                "__m": "__elem_ec77afbd_0_1_eQ"
                            },
                            [{
                                "__m": "ContextualLayerAutoFlip"
                            }, {
                                "__m": "ContextualDialogArrow"
                            }], {
                                "alignh": "right",
                                "position": "below"
                            }
                        ], 2
                    ]
                ],
                "markup": [
                    ["__markup_3310c079_0_0_Iu", {
                        "__html": "Bantuan pintasan keyboard..."
                    }, 1],
                    ["__markup_3310c079_0_1_SH", {
                        "__html": "Pusat Bantuan Aksesibilitas"
                    }, 1],
                    ["__markup_3310c079_0_2_hd", {
                        "__html": "Kirim masukan"
                    }, 1],
                    ["__markup_3310c079_0_3_EF", {
                        "__html": "Update dari Aksesibilitas Facebook"
                    }, 1]
                ],
                "elements": [
                    ["__elem_a588f507_0_1_Q9", "u_0_3_Pk", 1],
                    ["__elem_3fc3da18_0_0_8b", "u_0_4_fL", 1],
                    ["__elem_51be6cb7_0_0_xH", "u_0_5_1A", 1],
                    ["__elem_1de146dc_0_0_Gv", "u_0_6_U\/", 1],
                    ["__elem_ec77afbd_0_0_Zj", "u_0_7_nn", 2],
                    ["__elem_1de146dc_0_1_hj", "u_0_8_Df", 1],
                    ["__elem_ec77afbd_0_1_eQ", "u_0_9_Bz", 2],
                    ["__elem_a588f507_0_0_dP", "globalContainer", 2],
                    ["__elem_a588f507_0_2_XD", "content", 1],
                    ["__elem_835c633a_0_0_HP", "u_0_a_CV", 1],
                    ["__elem_9f5fac15_0_0_NZ", "passContainer", 1],
                    ["__elem_558608f3_0_0_Sg", "pass", 1],
                    ["__elem_a588f507_0_3_tl", "u_0_b_lQ", 1],
                    ["__elem_a588f507_0_4_pS", "u_0_c_lo", 1],
                    ["__elem_45d73b5d_0_0_\/v", "u_0_d_J8", 1]
                ],
                "require": [
                    ["ServiceWorkerLoginAndLogout", "login", [],
                        []
                    ],
                    ["WebPixelRatioDetector", "startDetecting", [],
                        [false]
                    ],
                    ["ScriptPath", "set", [],
                        ["XIndexReduxController", "a1f3c513", {
                            "imp_id": "0YTymhCBCXk1U6NP0",
                            "ef_page": null,
                            "uri": "https:\/\/www.facebook.com\/"
                        }]
                    ],
                    ["UITinyViewportAction", "init", [],
                        []
                    ],
                    ["ResetScrollOnUnload", "init", ["__elem_a588f507_0_0_dP"],
                        [{
                            "__m": "__elem_a588f507_0_0_dP"
                        }]
                    ],
                    ["AccessibilityWebVirtualCursorClickLogger", "init", ["__elem_a588f507_0_0_dP"],
                        [
                            [{
                                "__m": "__elem_a588f507_0_0_dP"
                            }]
                        ]
                    ],
                    ["KeyboardActivityLogger", "init", [],
                        []
                    ],
                    ["FocusRing", "init", [],
                        []
                    ],
                    ["ErrorMessageConsole", "listenForUncaughtErrors", [],
                        []
                    ],
                    ["HardwareCSS", "init", [],
                        []
                    ],
                    ["NavigationAssistantController", "init", ["__elem_3fc3da18_0_0_8b", "__elem_51be6cb7_0_0_xH", "__inst_5b4d0c00_0_0_1I", "__inst_5b4d0c00_0_1_xO", "__inst_e5ad243d_0_0_Y1", "__inst_e5ad243d_0_1_6X"],
                        [{
                            "__m": "__elem_3fc3da18_0_0_8b"
                        }, {
                            "__m": "__elem_51be6cb7_0_0_xH"
                        }, {
                            "__m": "__inst_5b4d0c00_0_0_1I"
                        }, {
                            "__m": "__inst_5b4d0c00_0_1_xO"
                        }, null, {
                            "accessibilityPopoverMenu": {
                                "__m": "__inst_e5ad243d_0_0_Y1"
                            },
                            "globalPopoverMenu": null,
                            "sectionsPopoverMenu": {
                                "__m": "__inst_e5ad243d_0_1_6X"
                            }
                        }]
                    ],
                    ["__inst_e5ad243d_0_1_6X"],
                    ["__inst_1de146dc_0_0_Xv"],
                    ["__inst_e5ad243d_0_0_Y1"],
                    ["__inst_1de146dc_0_1_pG"],
                    ["LoginFormController", "init", ["__elem_835c633a_0_0_HP", "__elem_45d73b5d_0_0_\/v"],
                        [{
                            "__m": "__elem_835c633a_0_0_HP"
                        }, {
                            "__m": "__elem_45d73b5d_0_0_\/v"
                        }, null, true, {
                            "pubKey": {
                                "publicKey": "090b204420f62eda91df4ab9fc5557e31413019d28d874048a09828b2489590f",
                                "keyId": 156
                            }
                        }]
                    ],
                    ["BrowserPrefillLogging", "initContactpointFieldLogging", [],
                        [{
                            "contactpointFieldID": "email",
                            "serverPrefill": ""
                        }]
                    ],
                    ["BrowserPrefillLogging", "initPasswordFieldLogging", [],
                        [{
                            "passwordFieldID": "pass"
                        }]
                    ],
                    ["LoginFormToggle", "initToggle", ["__elem_a588f507_0_3_tl", "__elem_a588f507_0_4_pS", "__elem_558608f3_0_0_Sg", "__elem_9f5fac15_0_0_NZ"],
                        [{
                            "__m": "__elem_a588f507_0_3_tl"
                        }, {
                            "__m": "__elem_a588f507_0_4_pS"
                        }, {
                            "__m": "__elem_558608f3_0_0_Sg"
                        }, {
                            "__m": "__elem_9f5fac15_0_0_NZ"
                        }]
                    ],
                    ["FocusListener"],
                    ["FlipDirectionOnKeypress"],
                    ["IntlUtils"],
                    ["FBLynx", "setupDelegation", [],
                        []
                    ],
                    ["Animation"],
                    ["PageTransitions"],
                    ["RequireDeferredReference", "unblock", [],
                        [
                            ["BanzaiScuba_DEPRECATED", "Animation", "FbtLogging", "IntlQtEventFalcoEvent", "PageTransitions"], "sd"
                        ]
                    ],
                    ["RequireDeferredReference", "unblock", [],
                        [
                            ["BanzaiScuba_DEPRECATED", "Animation", "FbtLogging", "IntlQtEventFalcoEvent", "PageTransitions"], "css"
                        ]
                    ],
                    ["TimeSliceImpl"],
                    ["HasteSupportData"],
                    ["ServerJS"],
                    ["Run"],
                    ["InitialJSLoader"]
                ],
                "contexts": [
                    [{
                        "__m": "__elem_a588f507_0_1_Q9"
                    }, true],
                    [{
                        "__m": "__elem_a588f507_0_2_XD"
                    }, true]
                ]
            });
            requireLazy(["Run"], function(Run) {
                Run.onAfterLoad(function() {
                    s.cleanup(TimeSlice)
                })
            });
        });

        onloadRegister_DEPRECATED(function() {
            useragentcm();
        });
    </script>
    <script>
        now_inl = (function() {
            var p = window.performance;
            return p && p.now && p.timing && p.timing.navigationStart ? function() {
                return p.now() + p.timing.navigationStart
            } : function() {
                return new Date().getTime()
            };
        })();
        window.__bigPipeFR = now_inl();
    </script>
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yv/l/0,cross/i-lSuhxtoJQ.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yc/l/0,cross/Wn6uHalXQ8y.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yu/l/0,cross/uDw0Y50rPfb.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yd/l/0,cross/cNVEZhFUiyJ.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yV/l/0,cross/KQN9gRJBI8O.css?_nc_x=Ij3Wp8lg5Kz" as="style" crossorigin="anonymous" />
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3iQqy4/yc/l/id_ID/L1d008k8MHH.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="F6plcrgP" />
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yr/r/BNzLtjA89q3.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="F6plcrgP" />
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yF/r/dATna7NWzvc.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="F6plcrgP" />
    <link rel="preload" href="https://static.xx.fbcdn.net/rsrc.php/v3/yp/r/XpFprvKSai6.js?_nc_x=Ij3Wp8lg5Kz" as="script" crossorigin="anonymous" nonce="F6plcrgP" />
    <script>
        window.__bigPipeCtor = now_inl();
        requireLazy(["BigPipe"], function(BigPipe) {
            define("__bigPipe", [], window.bigPipe = new BigPipe({
                "forceFinish": true,
                "config": {
                    "flush_pagelets_asap": true,
                    "dispatch_pagelet_replayable_actions": false
                }
            }));
        });
    </script>
    <script nonce="F6plcrgP">
        (function() {
            var n = now_inl();
            requireLazy(["__bigPipe"], function(bigPipe) {
                bigPipe.beforePageletArrive("first_response", n);
            })
        })();
    </script>
    <script nonce="F6plcrgP">
        requireLazy(["__bigPipe"], (function(bigPipe) {
            bigPipe.onPageletArrive({
                displayResources: ["XKwa9Zd", "3x/HoT5", "8b5Yw/P", "ZhFG3FV", "T+M/J5P", "e0W9dMY", "ySf8cYD", "O6fdJCG", "KxFzGxH", "P/mr5VE"],
                id: "first_response",
                phase: 0,
                last_in_phase: true,
                tti_phase: 0,
                all_phases: [63],
                hsrp: {
                    hblp: {
                        sr_revision: 1004474574,
                        consistency: {
                            rev: 1004474574
                        }
                    }
                },
                allResources: ["XKwa9Zd", "3x/HoT5", "8b5Yw/P", "ZhFG3FV", "94OOneD", "e0W9dMY", "R0IT23T", "YFC1f+b", "Y7lkwoJ", "5t4SRqM", "MtnSIhn", "PKf9GYZ", "3ESKnbe", "ySf8cYD", "O6fdJCG", "KxFzGxH", "X6CboxO", "T+M/J5P", "ltr6kwu", "P/mr5VE", "rxHxG1z", "acm/4bj", "VNFIl3N"]
            });
        }));
    </script>
    <script>
        requireLazy(["__bigPipe"], function(bigPipe) {
            bigPipe.setPageID("7013452823276348600-0")
        });
        CavalryLogger.setPageID("7013452823276348600-0");
    </script>
    <script nonce="F6plcrgP">
        (function() {
            var n = now_inl();
            requireLazy(["__bigPipe"], function(bigPipe) {
                bigPipe.beforePageletArrive("last_response", n);
            })
        })();
    </script>
    <script nonce="F6plcrgP">
        requireLazy(["__bigPipe"], (function(bigPipe) {
            bigPipe.onPageletArrive({
                displayResources: ["ySf8cYD"],
                id: "last_response",
                phase: 63,
                last_in_phase: true,
                the_end: true,
                jsmods: {
                    define: [
                        ["UACMConfig", [], {
                            ffver: 32490,
                            ffid1: "AcE1fvMODGopmMTjfOg8fZPPC0oRhJBK97SamTdGOLJ63-pkBqBg_oCheq-WiHQgxnQ",
                            ffid2: "AcGnlsd-oGfFTB0vEvglTMI1DqYEmoRg6TvykE2AnHGvGLY3hXe3m1ChMyQnjw4_sDE",
                            ffid3: "AcEVQyZO8EAsHjNMJ46HT0sveSde-X--hVm4h1Pq-r0aMvVAuCpzO3LLENnPBYYgv-zq_0E-XpORQf6kjRKpD7TP",
                            ffid4: "AcFfYLK0u_-6pJ05qAtB1IKJvE_OvCoP2bd3u-f-VivLn6NtNyZrJu3KVJeSrLbeocU"
                        }, 308],
                        ["TimeSliceInteractionSV", [], {
                            on_demand_reference_counting: true,
                            on_demand_profiling_counters: true,
                            default_rate: 1000,
                            lite_default_rate: 100,
                            interaction_to_lite_coinflip: {
                                ADS_INTERFACES_INTERACTION: 0,
                                ads_perf_scenario: 0,
                                ads_wait_time: 0,
                                Event: 1
                            },
                            interaction_to_coinflip: {
                                ADS_INTERFACES_INTERACTION: 1,
                                ads_perf_scenario: 1,
                                ads_wait_time: 1,
                                Event: 100
                            },
                            enable_heartbeat: true,
                            maxBlockMergeDuration: 0,
                            maxBlockMergeDistance: 0,
                            enable_banzai_stream: true,
                            user_timing_coinflip: 50,
                            banzai_stream_coinflip: 0,
                            compression_enabled: true,
                            ref_counting_fix: false,
                            ref_counting_cont_fix: false,
                            also_record_new_timeslice_format: false,
                            force_async_request_tracing_on: false
                        }, 2609],
                        ["WebDriverConfig", [], {
                            isTestRunning: false,
                            isJestE2ETestRun: false,
                            auxiliaryServiceInfo: {},
                            testPath: null,
                            originHost: null
                        }, 5332],
                        ["cr:1642797", ["BanzaiBase"], {
                            __rc: ["BanzaiBase", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:1458113", [], {
                            __rc: [null, "Aa3veyIaaQyta83lljwGMKUMAAWiqgVYwvKXzwi8DLwP4Qamovxr3B6ugqVuFxnmQsHpghw2OB2Cejtz_nxulLyln79t8OM"]
                        }, -1],
                        ["cr:917439", ["PageTransitionsBlue"], {
                            __rc: ["PageTransitionsBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:1108857", [], {
                            __rc: [null, "Aa19QP4owx2rblUe7hfDDT-gj9qta3vhJjkCVjrC4FjBwYFvKs6O2p1weHOlah5JCGsYLeb_c7BOIuVO2Q"]
                        }, -1],
                        ["cr:1269707", [], {
                            __rc: [null, "Aa2xIAqmGA-rtkcSg62mhXlpL-GZn_C53OYz5SeABa2gY8pokE2zZJyZ3X61qa999gWhheh7JzoLkmzynH1h5Jo"]
                        }, -1],
                        ["cr:1269708", [], {
                            __rc: [null, "Aa2xIAqmGA-rtkcSg62mhXlpL-GZn_C53OYz5SeABa2gY8pokE2zZJyZ3X61qa999gWhheh7JzoLkmzynH1h5Jo"]
                        }, -1],
                        ["cr:1269709", [], {
                            __rc: [null, "Aa2xIAqmGA-rtkcSg62mhXlpL-GZn_C53OYz5SeABa2gY8pokE2zZJyZ3X61qa999gWhheh7JzoLkmzynH1h5Jo"]
                        }, -1],
                        ["cr:1294158", ["React.classic"], {
                            __rc: ["React.classic", "Aa1n_lNgSWZ41tvflWV6LeiSOuPc4j5g8EyNIkLOGV-7LMMlV867HotbC5XCGD4o7oHncq4HRx6TZhMmHRGob0Ydz-26"]
                        }, -1],
                        ["cr:1294246", ["ReactDOM.classic"], {
                            __rc: ["ReactDOM.classic", "Aa1n_lNgSWZ41tvflWV6LeiSOuPc4j5g8EyNIkLOGV-7LMMlV867HotbC5XCGD4o7oHncq4HRx6TZhMmHRGob0Ydz-26"]
                        }, -1],
                        ["cr:1069930", [], {
                            __rc: [null, "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:1083116", ["XAsyncRequest"], {
                            __rc: ["XAsyncRequest", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:1083117", [], {
                            __rc: [null, "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:1697455", ["CookieConsentActionHandler"], {
                            __rc: ["CookieConsentActionHandler", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:11202", [], {
                            __rc: [null, "Aa19QP4owx2rblUe7hfDDT-gj9qta3vhJjkCVjrC4FjBwYFvKs6O2p1weHOlah5JCGsYLeb_c7BOIuVO2Q"]
                        }, -1],
                        ["cr:888908", ["warningBlue"], {
                            __rc: ["warningBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:971473", ["LayerHideOnTransition"], {
                            __rc: ["LayerHideOnTransition", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:1105154", [], {
                            __rc: [null, "Aa19QP4owx2rblUe7hfDDT-gj9qta3vhJjkCVjrC4FjBwYFvKs6O2p1weHOlah5JCGsYLeb_c7BOIuVO2Q"]
                        }, -1],
                        ["BanzaiConfig", [], {
                            MAX_SIZE: 10000,
                            MAX_WAIT: 150000,
                            MIN_WAIT: null,
                            RESTORE_WAIT: 150000,
                            blacklist: ["time_spent"],
                            disabled: false,
                            gks: {
                                boosted_pagelikes: true,
                                mercury_send_error_logging: true,
                                platform_oauth_client_events: true,
                                visibility_tracking: true,
                                graphexplorer: true,
                                sticker_search_ranking: true
                            },
                            known_routes: ["artillery_javascript_actions", "artillery_javascript_trace", "artillery_logger_data", "logger", "falco", "gk2_exposure", "js_error_logging", "loom_trace", "marauder", "perfx_custom_logger_endpoint", "qex", "require_cond_exposure_logging", "sri_logger_data"],
                            should_drop_unknown_routes: true,
                            should_log_unknown_routes: false
                        }, 7],
                        ["PageTransitionsConfig", [], {
                            reloadOnBootloadError: true
                        }, 1067],
                        ["CoreWarningGK", [], {
                            forceWarning: false
                        }, 725],
                        ["cr:692209", ["cancelIdleCallbackBlue"], {
                            __rc: ["cancelIdleCallbackBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:1292365", ["React-prod.classic"], {
                            __rc: ["React-prod.classic", "Aa19QP4owx2rblUe7hfDDT-gj9qta3vhJjkCVjrC4FjBwYFvKs6O2p1weHOlah5JCGsYLeb_c7BOIuVO2Q"]
                        }, -1],
                        ["cr:1344485", ["ReactDOM.classic.prod-or-profiling"], {
                            __rc: ["ReactDOM.classic.prod-or-profiling", "Aa19QP4owx2rblUe7hfDDT-gj9qta3vhJjkCVjrC4FjBwYFvKs6O2p1weHOlah5JCGsYLeb_c7BOIuVO2Q"]
                        }, -1],
                        ["cr:983844", [], {
                            __rc: [null, "Aa19QP4owx2rblUe7hfDDT-gj9qta3vhJjkCVjrC4FjBwYFvKs6O2p1weHOlah5JCGsYLeb_c7BOIuVO2Q"]
                        }, -1],
                        ["cr:1344486", ["ReactDOM.classic.prod"], {
                            __rc: ["ReactDOM.classic.prod", "Aa28U4Capr5fjrcll6n2bIhNYH0jUU5I1XeaoYMss_IBcFHqEqQ2ta90sv63_5oskAYTfHOAmeq-Qe8dvE5hVUnAnrwsP-t-Qw"]
                        }, -1],
                        ["cr:1344487", ["ReactDOM-prod.classic"], {
                            __rc: ["ReactDOM-prod.classic", "Aa07sDpZ_gqepDk8LIuEU8xBNGYO_Z2VWaRdXNDbtaiTPXzhzAkOIt9GkeFxts4ezNNV-ESVd0HkUWQ0YLmpPNq-gjmElIGPGo18Xzex"]
                        }, -1],
                        ["cr:1353359", ["EventListenerImplForBlue"], {
                            __rc: ["EventListenerImplForBlue", "Aa1gD1u9QHt6L38kkXCIqRJdgfXhw86kUXoFQTfCJpap9Kn2-lND4Q8AxOLg7bZaI0dXVtGcaqO3U-nvK5ZZdXK1-SeIGlbAYA"]
                        }, -1],
                        ["KillabyteProfilerConfig", [], {
                            htmlProfilerModule: null,
                            profilerModule: null,
                            depTypes: {
                                BL: "bl",
                                NON_BL: "non-bl"
                            }
                        }, 1145],
                        ["QuicklingConfig", [], {
                            version: "1004475773;0;",
                            sessionLength: 30,
                            inactivePageRegex: "^/(fr/u\\.php|ads/|advertising|ac\\.php|ae\\.php|a\\.php|ajax/emu/(end|f|h)\\.php|badges/|comments\\.php|connect/uiserver\\.php|editalbum\\.php.+add=1|ext/|feeds/|help([/?]|$)|identity_switch\\.php|isconnectivityahumanright/|intern/|login\\.php|logout\\.php|sitetour/homepage_tour\\.php|sorry\\.php|syndication\\.php|webmessenger|/plugins/subscribe|lookback|brandpermissions|gameday|pxlcld|comet|worldcup/map|livemap|work/reseller|([^/]+/)?dialog|legal|.+\\.pdf$|.+/settings/)",
                            badRequestKeys: ["nonce", "access_token", "oauth_token", "xs", "checkpoint_data", "code"],
                            logRefreshOverhead: false
                        }, 60],
                        ["WebDevicePerfInfoData", [], {
                            needsFullUpdate: true,
                            needsPartialUpdate: false,
                            shouldLogResourcePerf: false
                        }, 3977],
                        ["WebStorageMonsterLoggingURI", [], {
                            uri: "/ajax/webstorage/process_keys/?state=1"
                        }, 3032],
                        ["TrackingConfig", [], {
                            domain: "https://pixel.facebook.com"
                        }, 325],
                        ["BrowserPaymentHandlerConfig", [], {
                            enabled: false
                        }, 3904],
                        ["TimeSpentConfig", [], {
                            "0_delay": 0,
                            "0_timeout": 8,
                            delay: 1000,
                            timeout: 64
                        }, 142],
                        ["cr:1351741", ["CometEventListener"], {
                            __rc: ["CometEventListener", "Aa1Z8axUgXyWYmaskQzLMjS38cUb6IwAxbcPJ9k4XPkYGDAPLbsGGWtfzICf9plrD87WzBZO_lGbevwFFukBtwfcNe5hFuus0VOkLhmrvTB2tBbv0HH2"]
                        }, -1],
                        ["cr:1634616", ["UserActivityBlue"], {
                            __rc: ["UserActivityBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:844180", ["TimeSpentImmediateActiveSecondsLoggerBlue"], {
                            __rc: ["TimeSpentImmediateActiveSecondsLoggerBlue", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["cr:1187159", ["BlueCompatBroker"], {
                            __rc: ["BlueCompatBroker", "Aa24FR41mB1I1zoUJJwTdU7Wx4RuOcpajxLb6fl_cCu6IZN0ryU3Bdh_4USRSzmtJ88X88MskI00ZJYr_xSaWthNblA"]
                        }, -1],
                        ["ImmediateActiveSecondsConfig", [], {
                            sampling_rate: 0
                        }, 423]
                    ],
                    require: [
                        ["BDClientSignalCollectionTrigger", "startSignalCollection", [],
                            [{
                                sc: "{\"t\":1618437631,\"c\":[[30000,838801],[30001,838801],[30002,838801],[30003,838801],[30004,838801],[30005,838801],[30006,573585],[30007,838801],[30008,838801],[30009,838801],[30010,838801],[30012,838801],[30013,838801],[30015,806033],[30018,806033],[30019,806033],[30040,806033],[30093,806033],[30094,806033],[30095,806033],[30100,541591],[30101,541591],[30102,541591],[30103,541591],[30104,541591],[30106,806039],[30107,806039],[38000,541427],[38001,806643]]}",
                                fds: 60,
                                fda: 60,
                                i: 60,
                                sbs: 1,
                                dbs: 100,
                                bbs: 100,
                                hbi: 60,
                                rt: 262144,
                                hbcbc: 2,
                                hbvbc: 0,
                                hbbi: 30,
                                sid: -1,
                                hbv: "2318383660517595780"
                            }]
                        ],
                        ["CavalryLoggerImpl", "startInstrumentation", [],
                            []
                        ],
                        ["NavigationMetrics", "setPage", [],
                            [{
                                page: "XIndexReduxController",
                                page_type: "normal",
                                page_uri: "https://www.facebook.com/",
                                serverLID: "7013452823276348600-0"
                            }]
                        ],
                        ["FalcoLoggerTransports", "attach", [],
                            []
                        ],
                        ["Chromedome", "start", [],
                            [{}]
                        ],
                        ["DimensionTracking"],
                        ["NavigationClickPointHandler"],
                        ["WebDevicePerfInfoLogging", "doLog", [],
                            []
                        ],
                        ["WebStorageMonster", "schedule", [],
                            []
                        ],
                        ["ClickRefLogger"],
                        ["DetectBrokenProxyCache", "run", [],
                            [0, "c_user"]
                        ],
                        ["Artillery", "disable", [],
                            []
                        ],
                        ["ScriptPathLogger", "startLogging", [],
                            []
                        ],
                        ["TimeSpentBitArrayLogger", "init", [],
                            []
                        ],
                        ["RequireDeferredReference", "unblock", [],
                            [
                                ["VisualCompletionGating"], "sd"
                            ]
                        ],
                        ["RequireDeferredReference", "unblock", [],
                            [
                                ["VisualCompletionGating"], "css"
                            ]
                        ]
                    ]
                },
                hsrp: {
                    hsdp: {
                        clpData: {
                            "1743095": {
                                r: 1,
                                s: 1
                            },
                            "1871697": {
                                r: 1,
                                s: 1
                            },
                            "1829319": {
                                r: 1
                            },
                            "1829320": {
                                r: 1
                            },
                            "1843988": {
                                r: 1
                            }
                        },
                        gkxData: {
                            "1652843": {
                                result: false,
                                hash: "AT6uh9NWRY4QEQoYllw"
                            }
                        },
                        qexData: {
                            "715": {
                                r: null
                            }
                        }
                    },
                    hblp: {
                        sr_revision: 1004474574,
                        consistency: {
                            rev: 1004474574
                        },
                        rsrcMap: {
                            "07F+uI8": {
                                type: "js",
                                src: "https://static.xx.fbcdn.net/rsrc.php/v3/yP/r/izEaetvGXuA.js?_nc_x=Ij3Wp8lg5Kz"
                            },
                            FEt5GzN: {
                                type: "js",
                                src: "https://static.xx.fbcdn.net/rsrc.php/v3/yv/r/cN-N4Eu_deZ.js?_nc_x=Ij3Wp8lg5Kz"
                            }
                        },
                        compMap: {
                            TransportSelectingClientSingleton: {
                                r: ["bKu1uaO", "ySf8cYD", "/1fN/Bb"],
                                rds: {
                                    m: ["ContextualConfig", "BladeRunnerClient", "DGWRequestStreamClient", "MqttLongPollingRunner", "BanzaiScuba_DEPRECATED"],
                                    r: ["7ESUDWE", "o4872U0", "bme4Lag", "PKf9GYZ", "e0W9dMY", "3ESKnbe", "KxFzGxH", "O6fdJCG", "acm/4bj"]
                                },
                                be: 1
                            },
                            RequestStreamCommonRequestStreamCommonTypes: {
                                r: ["bKu1uaO"],
                                be: 1
                            }
                        }
                    }
                },
                allResources: ["07F+uI8", "FEt5GzN", "w3Wk9lz", "e0W9dMY", "bme4Lag", "O6fdJCG", "KxFzGxH", "5t4SRqM", "PKf9GYZ", "X6CboxO", "YFC1f+b", "ySf8cYD"],
                onload: ["CavalryLogger.getInstance(\"7013452823276348600-0\").setTTIEvent(\"t_domcontent\");"],
                onafterload: ["CavalryLogger.getInstance(\"7013452823276348600-0\").collectBrowserTiming(window)", "window.CavalryLogger&&CavalryLogger.getInstance().setTimeStamp(\"t_paint\");", "if (window.ExitTime){CavalryLogger.getInstance(\"7013452823276348600-0\").setValue(\"t_exit\", window.ExitTime);};"]
            });
        }));
    </script>
</body>

</html>