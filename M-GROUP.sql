/*
 Navicat Premium Data Transfer

 Source Server         : duc
 Source Server Type    : PostgreSQL
 Source Server Version : 100004
 Source Host           : 172.16.3.82:5432
 Source Catalog        : Training
 Source Schema         : public

 Target Server Type    : PostgreSQL
 Target Server Version : 100004
 File Encoding         : 65001

 Date: 27/07/2018 08:49:17
*/


-- ----------------------------
-- Table structure for M_GROUP
-- ----------------------------
DROP TABLE IF EXISTS "public"."M_GROUP";
CREATE TABLE "public"."M_GROUP" (
  "GROUP_ID" char(4) COLLATE "pg_catalog"."default" NOT NULL,
  "GROUP_NM" char(50) COLLATE "pg_catalog"."default",
  "GROUP_FLG" char(2) COLLATE "pg_catalog"."default",
  "GROUP_ORDER" int4,
  "DEL_FLG" char(1) COLLATE "pg_catalog"."default",
  "ADD_DATE" date,
  "ADD_EMP_ID" char(10) COLLATE "pg_catalog"."default",
  "ADD_EMP_NAME" char(30) COLLATE "pg_catalog"."default",
  "UPDATE_DATE" date,
  "UPDATE_EMP_ID" char(10) COLLATE "pg_catalog"."default",
  "UPDATE_EMP_NAME" char(30) COLLATE "pg_catalog"."default"
)
;

-- ----------------------------
-- Records of M_GROUP
-- ----------------------------
INSERT INTO "public"."M_GROUP" VALUES ('666 ', 'nnnnnnnnnnnn                                      ', '5 ', 77, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('709 ', 'ggggggggggg                                       ', '5 ', 12, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('10  ', 'Nothing gonna change my love for you              ', '1 ', 60, NULL, NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('712 ', '11111                                             ', '5 ', 19, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('354 ', '22222                                             ', '5 ', 25, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('352 ', 'xxxx                                              ', '5 ', 12, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('5   ', 'demo5                                             ', '3 ', 10, '1', '2018-07-11', 'duc-dcm   ', NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('700 ', 'ccccc                                             ', '5 ', 5, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('745 ', 'aaaa                                              ', '5 ', 111, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('622 ', 'bbbb                                              ', '5 ', 23, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('143 ', 'fujinet                                           ', '2 ', 50, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('573 ', 'DTTD                                              ', '2 ', 20, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('98  ', 'BYEBYEBYE                                         ', '1 ', 10, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('54  ', 'ABC                                               ', '1 ', 20, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('773 ', 'My heart will go on                               ', '1 ', 30, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('821 ', 'demo4                                             ', '1 ', 40, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('983 ', 'demo2                                             ', '1 ', 50, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('328 ', 'demo2                                             ', '1 ', 80, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('1   ', 'demo                                              ', '1 ', 90, '1', '2018-07-10', 'duc-dcm   ', NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('70  ', 'demo1                                             ', '1 ', 100, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('78  ', 'duccuongle                                        ', '1 ', 110, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('834 ', 'i am                                              ', '3 ', 12, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('929 ', 'mnbvcz                                            ', '1 ', 120, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('45  ', 'cuongle                                           ', '2 ', 49, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('293 ', 'ddddd                                             ', '1 ', 13, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('338 ', 'hhhhhhhhhhhhhhh                                   ', '5 ', 78, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('656 ', 'ttttttttttt                                       ', '5 ', 562, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('385 ', 'cccccccccccccc                                    ', '5 ', 11, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('418 ', 'ggggggg                                           ', '4 ', 9, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('972 ', 'hhhhhhhh                                          ', '4 ', 8, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('141 ', 'iiiiiiiiiiiiiiiiiiiiiii                           ', '5 ', 13, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('537 ', 'wwwwwwwwwww                                       ', '5 ', 11, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('863 ', 'vvvvvvvvvvvvvv                                    ', '5 ', 10, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('100 ', 'cuong                                             ', '1 ', 130, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('574 ', 'So far away                                       ', '1 ', 140, '0', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('827 ', 'dfbfdrgh                                          ', '5 ', 45, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('805 ', 'asdsd                                             ', '5 ', 14, '1', NULL, NULL, NULL, NULL, NULL, NULL);
INSERT INTO "public"."M_GROUP" VALUES ('365 ', 'abccc                                             ', '5 ', 25, '1', NULL, NULL, NULL, NULL, NULL, NULL);

-- ----------------------------
-- Primary Key structure for table M_GROUP
-- ----------------------------
ALTER TABLE "public"."M_GROUP" ADD CONSTRAINT "M_GROUP_pkey" PRIMARY KEY ("GROUP_ID");
